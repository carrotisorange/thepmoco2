<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;
use App\Models\Particular;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Contract;
use Illuminate\Validation\Rule;
use DB;
use Carbon\Carbon;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->get();

        return view('bills.index',[
            'active_contracts' => Contract::where('property_uuid', Session::get('property'))->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', Session::get('property'))->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => $particulars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit, Tenant $tenant, Contract $contract)
    {
        $bills = Tenant::find($tenant->uuid)->bills;
       
        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->get();

        return view('bills.create',[
            'unit' => $unit,
            'tenant' => $tenant,
            'contract' => $contract,
            'bills' => $bills,
            'particulars' => $particulars
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unit $unit, Tenant $tenant, Contract $contract)
    {    
         $attributes = request()->validate([
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'bill' =>'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start'
         ]);

        $bill_no = Property::find(Session::get('property'))->bills->count();

        try {
        $attributes['reference_no'] = Carbon::now()->timestamp.''.$bill_no++;
        $attributes['tenant_uuid'] = $tenant->uuid;
        $attributes['unit_uuid'] = $unit->uuid;
        $attributes['property_uuid'] = Session::get('property');
        $attributes['user_id'] = auth()->user()->id;
        $attributes['bill_no'] = Property::find(Session::get('property'))->bills->count()+1;

        Bill::create($attributes);
        DB::commit();
        return back()->with('success', 'Bill has been created.');
        } catch (\Throwable $e) {
            ddd($e);
            DB::rollback();
            return back()->with('error','Cannot complete your action.');
        }   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $bill = Bill::where('id', $id);
        if($bill->delete()){
            return back()->with('success', 'A bill has been removed.');
        }
            return back()->with('error', 'Cannot complete your action.');
    }
}
