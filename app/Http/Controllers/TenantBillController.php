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
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

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
            'bill' => 'required|integer|min:1',
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
         ]);

        try {
            
            DB::beginTransaction();
            
            $bill_no = Property::find(Session::get('property'))->bills->max('bill_no');

            $attributes['bill_no']= $bill_no+1;
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
}
