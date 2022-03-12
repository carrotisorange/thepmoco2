<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::join('provinces', 'tenants.province_id', 'provinces.id')
        ->join('cities', 'tenants.city_id', 'cities.id')
        ->paginate(10);

        return view('admin.tenants.index',[
            'tenants'=>$tenants
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

         return view('admin.tenants.create', [
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
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'mobile_number' => 'required',
        'type' => 'required',
        'gender' => 'required',
        'civil_status' => 'required',
        'country_id' => ['required', Rule::exists('countries', 'id')],
        'province_id' => ['required', Rule::exists('provinces', 'id')],
        'city_id' => ['required', Rule::exists('cities', 'id')],
        ]);

        $tenant_attributes['uuid'] = Str::uuid();

        $tenant = Tenant::create($tenant_attributes)->uuid;

         return redirect('/unit/'.$unit_uuid.'/tenant/'.$tenant.'/contract/'.Str::random(8).'/create')->with('success', 'New tenant has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return $tenant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
