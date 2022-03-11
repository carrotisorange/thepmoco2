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
    public function index()
    {
         $contracts = Contract::leftJoin('units', 'contracts.unit_uuid', 'units.uuid')
        ->leftJoin('tenants', 'contracts.tenant_uuid', 'tenants.uuid')
        ->leftJoin('buildings', 'units.building_id','buildings.id' )
        ->where('units.property_uuid', session('property'))
        ->groupBy('contracts.uuid')
        ->paginate(10);

        return view('contracts.index', [
            'contracts'=> $contracts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit)
    {
        $cities = City::all();
        $provinces = Province::all();
        $countries = Country::all();

        return view('contracts.create', [
            'uuid' => $unit->uuid,
            'unit' => $unit,
            'cities' => $cities,
            'provinces' => $provinces,
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $unit_uuid)
    {
        $tenant_attributes = request()->validate([
            'tenant' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'city_id' => ['required', Rule::exists('cities', 'id')],
        ]);

        $contract_attributes = request()->validate([
            'start' => 'required',
            'end' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'interaction' => 'required'
        ]);

        try {
            DB::beginTransaction();

              $tenant_attributes['uuid'] = Str::uuid();

              $tenant = Tenant::create($tenant_attributes)->uuid;

              $contract_attributes['uuid'] = Str::uuid();
              $contract_attributes['tenant_uuid'] = $tenant;
              $contract_attributes['unit_uuid'] = $unit_uuid;
              $contract_attributes['user_id'] = auth()->user()->id;
              $contract_attributes['status'] = 'pending';

              Contract::create($contract_attributes);

              Unit::where('uuid', $unit_uuid)->update([
              'status_id' => 4
              ]);

              Bill::create([
              'bill' => request('price'),
              'bill_no' => Property::find(Session::get('property'))->bills->count(),
              'start' => request('start'),
              'end' => request('start')->Carbon::now()->addMonth(),
              'tenant_uuid' => $tenant,
              'user_id' => auth()->user()->id,
              'particular_id' => 2,
              'property_uuid' => Session::get('property'),
              'unit_uuid'=> $unit_uuid,
              'due_date' => PropertyParticular::find(2)->due_date,
              ]);

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollback();
        }

        return redirect('/unit/'.$unit_uuid)->with('success', 'New tenant has been added to the unit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
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
