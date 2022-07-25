<?php

namespace App\Http\Controllers;

use App\Mail\SendBillToTenant;
use Illuminate\Http\Request;
use App\Models\Tenant;
use Session;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Bill;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use \PDF;
use Illuminate\Support\Facades\Mail;

class TenantBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Property $property, Tenant $tenant)
    {        
        $particulars = app('App\Http\Controllers\PropertyParticularController')->show($property->uuid);

        $unpaid_bills = $this->get_tenant_balance($tenant->uuid);

        $bills = $this->get_tenant_bills($tenant->uuid);

        $contracts = app('App\Http\Controllers\TenantContractController')->get_tenant_contracts($tenant->uuid);
      
        return view('tenants.bills.index',[
            'tenant' => $tenant,  
            'bills' => $bills,
            'unpaid_bills' => $unpaid_bills,
            'particulars' => $particulars,
            'units' => $contracts,
            'note_to_bill' => $property->note_to_bill,
        ]);
    }

    public function get_tenant_bills($tenant_uuid)
    {
        return Tenant::find($tenant_uuid)->bills()->orderBy('bill_no','desc')->get();
    }

    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_tenant_balance($tenant_uuid)
    {
        return Bill::where('tenant_uuid', $tenant_uuid)->whereIn('status', ['unpaid', 'partially_paid']);
    }

    public function store(Request $request, Property $property, Tenant $tenant)
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
            
            $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($property->uuid);
            
            $attributes['bill_no']= $bill_no;

            if($request->particular_id == 8)
            {
              $attributes['bill'] = -($request->bill);
            }

            $attributes['reference_no']= $tenant->bill_reference_no;

            $attributes['due_date'] = Carbon::parse($request->start)->addDays(7);

            $attributes['user_id'] = auth()->user()->id;

            $attributes['property_uuid'] = $property->uuid;

            $attributes['tenant_uuid'] = $tenant->uuid;

            Bill::create($attributes);

            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 1, 3);

            DB::commit();

            return back()->with('success','Bill is successfully posted.');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            
            return back()->with('error','Cannot perform the action. Please try again.');
        }
    }

    public function export(Request $request, Property $property, Tenant $tenant)
    {
       app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

       $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);
    
        $pdf = $this->generate_pdf($data, $property);

       return $pdf->download($tenant->tenant.'-soa.pdf');
    }

    public function generate_pdf($data, $property)
    {
        $pdf = PDF::loadView('tenants.bills.export', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();

        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, $property->property, null, 55, array(0,0,0),2,2,-30);

        return $pdf;
    }

    public function send(Request $request, Property $property, Tenant $tenant)
    {    
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        Mail::to($request->email)->send(new SendBillToTenant($data));

        return back()->with('success', 'Unpaid bills is successfully sent');
    }

    public function get_bill_data($tenant, $due_date, $penalty, $note)
    {
        return $data = [
            'tenant' => $tenant->tenant,
            'reference_no' => $tenant->bill_reference_no,
            'due_date' => $due_date,
            'penalty' => $penalty,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => $this->get_tenant_bills($tenant->uuid),
            'note_to_bill' => $note,
        ];
    }
}
