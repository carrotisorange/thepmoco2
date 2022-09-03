<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Property;
use App\Models\User;
use App\Models\Contract;
use App\Models\Reference;
use App\Models\Guardian;
use App\Models\Bill;
use App\Models\AcknowledgementReceipt;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        //store activity for opening tenant page.
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',3);

        //retrieve all tenants associated to the current property.
        $list_of_all_the_tenants = app('App\Http\Controllers\PropertyController')->show_list_of_all_tenants($property->uuid);

        return view('tenants.index',[
            'tenants'=>$list_of_all_the_tenants
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
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, Tenant $tenant)
    {
        //store activity for opening a particular tenant.
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens one',3);

        $list_of_all_relationships = app('App\Http\Controllers\RelationshipController')->index();

        return view('tenants.show',[
            'tenant_details' => $tenant,
            'relationships' => $list_of_all_relationships
        ]);
    }

    public function show_all_guardians($tenant_uuid)
    {
        return Tenant::find($tenant_uuid)->guardians()->paginate(5);
    }

    public function show_all_references($tenant_uuid)
    {
        return Tenant::find($tenant_uuid)->references()->paginate(5);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {   
        //  if(auth()->user()->role->id == 3 || auth()->user()->role->id == 2)
        //  {
        //     return redirect('/tenant/'.$tenant->uuid.'/bills');
        //  }
        //  else{
        //      return view('tenants.edit',[
        //      'tenant_details' => $tenant,
        //      'references' => Tenant::find($tenant->uuid)->references,
        //      'guardians' => Tenant::find($tenant->uuid)->guardians,
        //      'relationships' => Relationship::all()
        //      ]);
        //  } 
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

    public function generate_credentials($tenant_uuid)
    {
        $tenant = Tenant::find($tenant_uuid);

        $count_user = User::where('email', $tenant->email)->count();
        if($count_user > 0)
        {
            return back()->with('error', 'The email address is already taken.');
        }

         $user_id = app('App\Http\Controllers\UserController')->store(
            $tenant->tenant,
            app('App\Http\Controllers\UserController')->generate_temporary_username(),
            app('App\Http\Controllers\UserController')->generate_temporary_username(),
            auth()->user()->external_id,
            $tenant->email,
            8, //tenant
            $tenant->mobile_number,
            "none",
            auth()->user()->checkoutoption_id,
            auth()->user()->plan_id,
         );

        // $user_id = app('App\Http\Controllers\UserController')->store(
        //     $tenant->tenant,
        //     $tenant->email,
        //     app('App\Http\Controllers\UserController')->generate_temporary_username(),
        //     auth()->user()->external_id,
        //     $tenant->email,
        //     8,
        //     $tenant->mobile_number,
        //     "none",
        //     auth()->user()->checkoutoption_id,
        //     auth()->user()->plan_id,
        // );

        User::where('id', $user_id)
          ->update([
          'tenant_uuid' => $tenant->uuid
        ]);

        return back()->with('succcess', 'Credentials are generated successfully!');
    }

    public function show_tenant_contracts($tenant_uuid)
    {
       return Contract::where('tenant_uuid', $tenant_uuid)->orderBy('start','desc')->paginate(5);
    }

    public function get_tenant_references($tenant_uuid)
    {
       return Reference::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->paginate(5);
    }

    public function show_tenant_guardians($tenant_uuid)
    {
       return Guardian::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->paginate(5);
    }

    public function show_tenant_bills($tenant_uuid)
    {
       return Bill::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->paginate(5);
    }

    public function show_tenant_collections($tenant_uuid)
    {
       return AcknowledgementReceipt::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->paginate(5);
    }
}
