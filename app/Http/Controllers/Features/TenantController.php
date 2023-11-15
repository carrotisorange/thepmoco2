<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
use App\Mail\SendContractToTenant;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\{Tenant,Unit,Property,Contract,Reference,Guardian,Bill,AcknowledgementReceipt,Concern};


class TenantController extends Controller
{
    public function index(Property $property)
    {
        $featureId = 5; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        Session::forget('tenant_uuid');

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($restrictionId, $featureId);

        $tenants = $this->getTenants($property->uuid);

        return view('features.tenants.index',[
            'tenants'=>$tenants
        ]);
    }

    public function show(Property $property, Tenant $tenant)
    {
        Session::put('tenant_uuid', $tenant->uuid);

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens one',3);

        $list_of_all_relationships = app('App\Http\Controllers\Utilities\RelationshipController')->index();

        return view('features.tenants.show',[
            'property' => $property,
            'tenant_details' => $tenant,
            'relationships' => $list_of_all_relationships
        ]);
    }

    public function destroy($tenant_uuid){
       Tenant::where('uuid', $tenant_uuid)->delete();
    }


    public function getTenants()
    {
        return Tenant::where('property_uuid',Session::get('property_uuid'));
    }

    public function getVerifiedTenants(){
        return Tenant::join('users', 'tenants.uuid', 'users.tenant_uuid')
        ->where('tenants.property_uuid', Session::get('property_uuid'));
    }

    public function unlock(Property $property)
    {
        return view('admin.restrictedpages.tenantportal');
    }

    public function create(Unit $unit)
    {
        return view('features.tenants.create', [
            'unit' => $unit
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
           return redirect(url()->previous())->with('success', 'Changes Saved!');
        }catch(\Exception $e){
            DB::rollback();

            return back()->with('error', 'Cannot perform your action.');
        }

    }

    public function update_tenant_status($tenant_uuid, $status)
    {
        Tenant::where('uuid', $tenant_uuid)
        ->update([
          'status' => $status
        ]);
    }

    public function send_mail_to_tenant($email,$tenant, $start, $end, $rent, $unit)
      {
        $details =[
          'tenant' => $tenant,
          'start' => $start,
          'end' => $end,
          'rent' => $rent,
          'unit' => $unit,
        ];

        Mail::to($email)->send(new SendContractToTenant($details));
    }


    public function show_tenant_contracts($tenant_uuid)
    {
       return Contract::where('tenant_uuid', $tenant_uuid)->orderBy('start','desc')->get();
    }

    public function show_tenant_concerns($tenant_uuid)
    {
       return Concern::where('tenant_uuid', $tenant_uuid)->orderBy('created_at','desc')->get();
    }

    public function get_tenant_references($tenant_uuid)
    {
       return Reference::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->get();
    }

    public function show_tenant_guardians($tenant_uuid)
    {
       return Guardian::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->get();
    }

    public function show_tenant_bills($tenant_uuid)
    {
       return Bill::where('tenant_uuid', $tenant_uuid)->posted()->orderBy('id','desc')->get();
    }

    public function show_tenant_collections($tenant_uuid)
    {
       return AcknowledgementReceipt::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->paginate(5);
    }
}
