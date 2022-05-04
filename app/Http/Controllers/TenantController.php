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

        return view('tenants.index',[
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
         return view('tenants.create', [
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
        return view('tenants.show',[
            'tenant' => $tenant,
            'bills' => Tenant::find($tenant->uuid)->bills,
            'contracts' => Tenant::find($tenant->uuid)->contracts,
            'references' => Tenant::find($tenant->uuid)->references,
            'guardians' => Tenant::find($tenant->uuid)->guardians
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
         if(auth()->user()->role->id == 3 || auth()->user()->role->id == 2)
         {
            return redirect('/tenant/'.$tenant->uuid.'/bills');
         }
         else{
             return view('tenants.edit',[
             'tenant_details' => $tenant,
             'references' => Tenant::find($tenant->uuid)->references,
             'guardians' => Tenant::find($tenant->uuid)->guardians
             ]);
         } 
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
        return 'asdas';

        $attributes = request()->validate([
        'tenant' => 'required',
        'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('tenants', 'email')->ignore($tenant->uuid,
        'uuid')],
        'mobile_number' => ['nullable', Rule::unique('tenants', 'mobile_number')->ignore($tenant->uuid, 'uuid')],
        'birthdate' => 'nullable',
        'type' => 'nullable',
        'gender' => 'required',
        'civil_status' => 'nullable',
        'country_id' => ['nullable', Rule::exists('countries', 'id')],
        'province_id' => ['nullable', Rule::exists('provinces', 'id')],
        'city_id' => ['nullable', Rule::exists('cities', 'id')],
        'barangay' => 'nullable',
        'photo_id' => 'nullable|image',
        'school' => 'nullable',
        'school_address' => 'nullable',
        'occupation' => 'nullable',
        'employer_address' => 'nullable',
        'employer' => 'nullable',
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $tenant = Tenant::where('uuid', $uuid);
        if($tenant->delete()){
        return back()->with('success', 'A tenant has been removed.');
        }
        return back()->with('error', 'Cannot complete your action.');
    }
}
