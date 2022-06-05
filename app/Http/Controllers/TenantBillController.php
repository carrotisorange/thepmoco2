<?php

namespace App\Http\Controllers;

use App\Mail\SendBillToTenant;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Particular;
use Session;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Bill;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;
use \PDF;
use App\Models\Point;
use Illuminate\Support\Facades\Mail;

class TenantBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Tenant $tenant)
    {        

        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->get();

        return view('tenants.bills.index',[
            'tenant' => $tenant,  
            'bills' => Tenant::find($tenant->uuid)->bills()->orderBy('bill_no','desc')->get(),
            'unpaid_bills' => Tenant::find($tenant->uuid)
            ->bills()
            ->whereIn('status', ['unpaid', 'partially_paid'])
            ->get(),
            'particulars' => $particulars,
            'units' => Tenant::find($tenant->uuid)->contracts,
            'note_to_bill' => Property::find(Session::get('property'))->note_to_bill
        ]);
    }

    public function store(Request $request, Tenant $tenant)
    {

         $attributes = request()->validate([
            'bill' => 'required|numeric|min:1',
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
         ]);

        try {
            
            DB::beginTransaction();
            
            $bill_no = Property::find(Session::get('property'))->bills->max('bill_no');

            $attributes['bill_no']= $bill_no+1;
             if($request->particular_id == 8)
             {
              $attributes['bill'] = -($request->bill);
             }
            $attributes['reference_no']= $tenant->bill_reference_no;
            $attributes['due_date'] = Carbon::parse($request->start)->addDays(7);
            $attributes['user_id'] = auth()->user()->id;
            $attributes['property_uuid'] = Session::get('property');
            $attributes['tenant_uuid'] = $tenant->uuid;
            $attributes['description'] = 'movein charges';

            Bill::create($attributes);

            Point::create([
            'user_id' => auth()->user()->id,
            'point' => 1,
            'action_id' => 3,
            'property_uuid' => Session::get('property')
          ]);

            DB::commit();

            return back()->with('success','Bill is successfully posted.');
        }
        catch(\Exception $e)
        {
            ddd($e);
             return back()->with('error','Cannot perform the action. Please try again.');
        }
    }

    public function export(Request $request, Tenant $tenant)
    {

        Property::where('uuid',Session::get('property'))->update([
            'note_to_bill' => $request->note_to_bill,
        ]);

        $property = Property::find(Session::get('property'));

        $data = [
            'tenant' => $tenant->tenant,
            'reference_no' => $tenant->bill_reference_no,
            'due_date' => $request->due_date,
            'penalty' => $request->penalty,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => Tenant::find($tenant->uuid)
            ->bills()
            ->whereIn('status', ['unpaid', 'partially_paid'])
            ->orderBy('bill_no')
            ->get(),
            'note_to_bill' => $request->note_to_bill,
      
         ];

        $pdf = PDF::loadView('tenants.bills.export', $data);
       $pdf->output();
       $canvas = $pdf->getDomPDF()->getCanvas();

       $height = $canvas->get_height();
       $width = $canvas->get_width();

       $canvas->set_opacity(.2,"Multiply");

       $canvas->set_opacity(.2);

       $canvas->page_text($width/5, $height/2, $property->property, null,
       55, array(0,0,0),2,2,-30);

        return $pdf->stream($tenant->tenant.'-soa.pdf');
    }

    public function send(Request $request, Tenant $tenant)
    {
         Property::where('uuid',Session::get('property'))->update([
         'note_to_bill' => $request->note_to_bill,
         ]);

         $details = [
         'tenant' => $tenant->tenant,
         'due_date' => $request->due_date,
         'penalty' => $request->penalty,
         'user' => User::find(auth()->user()->id)->name,
         'role' => User::find(auth()->user()->id)->role->role,
         'bills' => Tenant::find($tenant->uuid)
         ->bills()
         ->whereIn('status', ['unpaid', 'partially_paid'])
         ->get(),
         'note_to_bill' => $request->note_to_bill,

         ];

         Mail::to('landleydgreat@gmail.com')->send(new SendBillToTenant($details));
    }
}
