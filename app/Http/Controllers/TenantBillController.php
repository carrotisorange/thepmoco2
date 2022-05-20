<?php

namespace App\Http\Controllers;

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
            'particulars' => $particulars,
            'units' => Tenant::find($tenant->uuid)->contracts
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

            Bill::create($attributes);

            DB::commit();

            return back()->with('success','Bill has been posted.');
        }
        catch(\Exception $e)
        {
            ddd($e);
             return back()->with('error','Cannot perform the action. Please try again.');
        }
    }

    public function export(Tenant $tenant)
    {
        $data = [
            'tenant' => $tenant->tenant,
            // 'mode_of_payment' => $ar->mode_of_payment,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            // 'ar_no' => $ar->ar_no,
            // 'amount' => $ar->amount,
            // 'cheque_no' => $ar->cheque_no,
            // 'bank' => $ar->bank,
            // 'date_deposited' => $ar->date_deposited,
            // 'collections' => Collection::where('tenant_uuid',$ar->tenant_uuid)->where('batch_no',
            // $ar->collection_batch_no)->whereDate('created_at',$ar->created_at)->get(),
            'bills' => Tenant::find($tenant->uuid)
            ->bills()
            ->whereIn('status', ['unpaid', 'partially_paid'])
            ->get(),
         ];

        $pdf = PDF::loadView('tenants.bills.export', $data);
        return $pdf->stream($tenant->tenant.'-soa.pdf');
    }
}
