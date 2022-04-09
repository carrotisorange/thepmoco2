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
use App\Models\Bill;
use App\Models\Barangay;
use App\Models\Contract;
use DB;
use App\Models\Property;
use Session;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Property::find(Session::get('property'))->tenants;

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
         return view('admin.tenants.create', [
         'unit' => $unit
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
        'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
        'mobile_number' => 'required',
        'type' => 'required',
        'gender' => 'required',
        'civil_status' => 'required',
        'country_id' => ['required', Rule::exists('countries', 'id')],
        'province_id' => ['required', Rule::exists('provinces', 'id')],
        'city_id' => ['required', Rule::exists('cities', 'id')],
        'photo_id' => 'required|image',
        ]);

        $tenant_attributes['uuid'] = Str::uuid();
        $tenant_attributes['photo_id'] = $request->file('photo_id')->store('tenants');

        $tenant = Tenant::create($tenant_attributes)->uuid;

        return redirect('/unit/'.$unit_uuid.'/tenant/'.$tenant.'/guardian/'.Str::random(8).'/create')->with('success', 'New tenant has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        $bills = Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
         ->select('*', 'bills.status as bill_status', 'bills.id as bill_id')
         ->join('particulars', 'bills.particular_id', 'particulars.id')
         ->where('tenants.uuid', $tenant->uuid)
         ->orderBy('bills.bill_no')
         ->get();

        $contracts = Tenant::find($tenant->uuid)->contracts;

        return view('admin.tenants.show',[
            'tenant' => $tenant,
            'bills' => $bills,
            'contracts' => $contracts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        return view('admin.tenants.edit',[
            'tenant' => $tenant, 
            'barangays' => Barangay::all(),
            'cities' => City::all(),
            'provinces' => Province::all(),
            'countries' => Country::all()
        ]);
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
        $attributes = request()->validate([
        'tenant' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('tenants', 'email')->ignore($tenant->id, 'uuid')],
        'mobile_number' => ['required', Rule::unique('tenants', 'mobile_number')->ignore($tenant->id, 'uuid')],
        'birthdate' => 'required',
        'type' => 'required',
        'gender' => 'required',
        'civil_status' => 'required',
        'country_id' => ['required', Rule::exists('countries', 'id')],
        'province_id' => ['required', Rule::exists('provinces', 'id')],
        'city_id' => ['required', Rule::exists('cities', 'id')],
        'barangay_id' => ['required', Rule::exists('barangays', 'id')],
        'photo_id' => 'image'
        ]);

          if(isset($attributes['photo_id']))
          {
            $attributes['photo_id'] = request()->file('photo_id')->store('avatars');
          }

        try{
    
        
            DB::beginTransaction();
            $tenant->update($attributes);
            DB::commit();
            return back()->with('success', 'Tenant has been updated.');
        }catch(\Exception $e){
            //ddd($e);
            DB::rollback();
            return back()->with('error', 'Cannot perform your action.');
        }

        return 'asd';

        
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
