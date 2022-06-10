<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use App\Models\PropertyParticular;
use Session;
use DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property)
    {
        return Contract::where('property_uuid', $property)->where('status', 'active')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit, Tenant $tenant)
    {
        Session::flash('success', 'You have skipped adding references.');

        return view('contracts.create', [
            'unit' => $unit,
            'tenant' => $tenant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Unit $unit, Tenant $tenant)
    {   
        $contract_attributes = request()->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'rent' => 'required',
            'discount' => 'required',
            'interaction' => 'required'
        ]);

        $contract_uuid = Str::uuid();

        try {
            DB::beginTransaction();

              $contract_attributes['uuid'] = $contract_uuid;
              $contract_attributes['tenant_uuid'] = $tenant->uuid;
              $contract_attributes['unit_uuid'] = $unit->uuid;
              $contract_attributes['user_id'] = auth()->user()->id;
              $contract_attributes['status'] = 'pending';

              Contract::create($contract_attributes);

            //   Unit::where('uuid', $unit->uuid)->update([
            //   'status_id' => 4
            //   ]);

            DB::commit();

              return
              redirect('/unit/'.$unit->uuid.'/tenant/'.$tenant->uuid.'/contract/'.$contract_uuid.'/bill/'.Str::random(8).'/create')->with('success','New
              contract has been created.');

        } catch (\Throwable $e) {
            DB::rollback();
            return back()->with('error','Cannot complete your action.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('contracts.edit',[
          'contract' => Contract::findOrFail($contract->uuid),
          'property' => Property::find(Session::get('property')),
        ]);
    }

    public function preview(Contract $contract)
    {
         Session::flash('success', 'Premove-in processed hasbeen completed.');
         
        return view('contracts.edit',[
        'contract' => Contract::findOrFail($contract->uuid),
        'property' => Property::find(Session::get('property')),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
