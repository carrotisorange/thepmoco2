<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Property;
use App\Mail\SendContractToTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\Contract;
use App\Models\Reference;
use App\Models\Guardian;
use App\Models\Bill;
use App\Models\AcknowledgementReceipt;
use App\Models\Concern;
use Session;

class TenantController extends Controller
{

    public function get_property_tenants($property_uuid, $duration)
    {
        return Tenant::where('property_uuid', $property_uuid)
         ->when($duration, function ($query) use ($duration) {
         $query->whereMonth('created_at', $duration);
         });
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
            return back()->with('success', 'Success!');
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
