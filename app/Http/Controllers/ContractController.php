<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Tenant;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $contracts = Contract::leftJoin('rooms', 'contracts.room_uuid', 'rooms.uuid')
        ->leftJoin('tenants', 'contracts.tenant_uuid', 'tenants.uuid')
        ->leftJoin('buildings', 'rooms.building_id','buildings.id' )
        ->where('rooms.property_uuid', session('property'))
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
    public function create(Room $room)
    {
        $cities = City::all();
        $provinces = Province::all();
        $countries = Country::all();

        return view('contracts.create', [
            'uuid' => $room->uuid,
            'room' => $room,
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
    public function store(Request $request, $uuid)
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

        $tenant_attributes['uuid'] = Str::uuid();

        $tenant = Tenant::create($tenant_attributes)->uuid;

        $contract_attributes['uuid'] = Str::uuid();
        $contract_attributes['tenant_uuid'] = $tenant;
        $contract_attributes['room_uuid'] = $uuid;
        $contract_attributes['user_id'] = auth()->user()->id;
        $contract_attributes['status'] = 'pending';

        Contract::create($contract_attributes);

        Room::where('uuid', $uuid)->update([
            'status_id' => 4
        ]);

        Bill::create([
            'bill' => request('price'),
            'bill_no' => Property::find(Session::get('property'))->bills->count(),
            'start' => request('start'),
            'end' => request('end'),
            'tenant_uuid' => $tenant,
            
        ]);

        return redirect('/room/'.$uuid)->with('success', 'New tenant has been added to the room.');
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
