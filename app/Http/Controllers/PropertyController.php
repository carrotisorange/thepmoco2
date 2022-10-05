<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\UserProperty;
use App\Models\PropertyParticular;
use App\Models\PropertyRole;
use Auth;
use Session;
use DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Bill;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\AcknowledgementReceipt;
use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\UnitStats;
use App\Models\Collection;
use App\Models\PaymentRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_list_of_all_tenants($property_uuid)
    {
        return Property::find($property_uuid)->tenants;
    }

    
    public function destroy_property_session()
    {
        Session::forget('property');
        Session::forget('property_name');
    }

    public function store_property_session($property)
    {
        session(['property' => $property->uuid]);
        session(['property_name' => $property->property]);
    }

    public function unlock($property_uuid)
    {
        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',20);

        return view('admin.restrictedpages.portforlio');
    }

    public function is_property_exist()
    {
        if(!User::find(auth()->user()->id)->user_properties->count()){
            return true; 
        }else{ 
            return false; 
        } 
    }

    public function generate_uuid()
    {
        return Str::uuid();
    }


    public function index()
    {
        $this->destroy_property_session();

        // if(!$this->is_property_exist()){
        //    return redirect('/property/'.Str::random(8).'/create');  
        // }
        
        if(auth()->user()->role_id == '12')
        {
            return redirect('/dashboard/sales');
        }
        elseif(auth()->user()->role_id == '10')
        {   
           return redirect('/dashboard/dev');
        }
        elseif(auth()->user()->role_id == '8')
        {
            return redirect(auth()->user()->role_id.'/tenant/'.auth()->user()->username);
        }
        elseif(auth()->user()->role_id == '7')
        {
            return redirect(auth()->user()->role_id.'/owner/'.auth()->user()->username);
        }
        else
        {
            return view('properties.index',[
                'properties'=> User::find(Auth::user()->id)->user_properties()->paginate(4)
            ]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($random_str)
    {
        $this->authorize('manager');
        
        return view('properties.create', [
            'random_str' => $random_str,
            'types' => Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'property' => 'required',
            'type_id' => ['required', Rule::exists('types', 'id')],
            'thumbnail' => 'required|image',
            'description' => '',
        ]);

    try {
        DB::beginTransaction();

        $property_uuid = Str::uuid();

        $attributes['uuid']= $property_uuid;
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Property::create($attributes);

        app('App\Http\Controllers\UserPropertyController')->store(Session::get('property'),auth()->user()->id,true,true);

        for($i=1; $i<=5; $i++){
            PropertyParticular::create([
                'property_uuid'=> $property_uuid,
                'particular_id'=> $i,
                'minimum_charge' => 0.00,
                'due_date' => 28,
                'surcharge' => 1
            ]);
        }

        for($i=1; $i<=4; $i++){
            PropertyRole::create([
                'property_uuid'=> $property_uuid,
                'role_id'=> $i,
            ]);
        }

        DB::commit();

    }catch (\Throwable $e) {
            DB::rollback();
        }

    return redirect('/properties')->with('success', 'New property has been created.');
    }

    public function get_occupancy_rate_dates()
    {
        return UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'), DB::raw('MAX(occupied)'),
        DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('month_year');
    }

    public function get_occupancy_rate_values()
    {
        return UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
        DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('occupancy_rate');
    }

    public function get_current_occupancy_rate($property_uuid)
    {
        return UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
        DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', $property_uuid)
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()
        ->last();
    }

    public function get_collection_rate_dates()
    {
        return AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"), DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('month_year');
    }

    public function get_collection_rate_values()
    {
        return AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('total_amount');
    }

    public function get_bill_rate_values()
    {
        return Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as
        month_year"))
        ->orderBy('created_at')
        ->where('property_uuid', Session::get('property'))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('total_bill');
    }

    public function get_current_collection_rate()
    {
        $current_collection_rate = 0;

        if(Bill::where('property_uuid', Session::get('property'))->count())
        {
            $current_collection_rate = AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->where('property_uuid', Session::get('property'))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('total_amount')
            ->last() / Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->orderBy('created_at')
            ->where('property_uuid', Session::get('property'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('total_bill')
            ->last() * 100;
         }else{
            $current_collection_rate = 0;
         }

         return $current_collection_rate;
    }

    public function get_tenant_type_labels()
    {
        return Tenant::
        where('property_uuid', Session::get('property'))
        ->groupBy('type')
        ->pluck('type');
    }

    public function get_tenant_type_values()
    {
        return Tenant::select(DB::raw('count(*) as count'))
        ->where('property_uuid', Session::get('property'))
        ->groupBy('type')
        ->pluck('count');
    }

    public function get_delinquents()
    {
        return Bill::selectRaw('sum(bill-initial_payment) as balance, tenant_uuid')
          ->where('property_uuid', Session::get('property'))
        ->groupBy('tenant_uuid')
        ->paginate(3);
    }
    

    public function get_tenant_movein_values()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M')) as month_year"))
        ->orderBy('start')
        ->where('property_uuid', Session::get('property'))
        ->where('status', 'active')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('count');
    }

    public function get_tenant_movein_labels()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
        ->orderBy('start')
        ->where('status', 'active')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('month_year');
    }

    public function get_tenant_moveout_values()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(moveout_at,
        '%M')) as month_year"))
        ->where('property_uuid', Session::get('property'))
        ->where('status', 'inactive')
        ->orderBy('moveout_at')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('month_year');
    }

    public function get_reasons_for_moveout_values()
    {
        return Contract::select('moveout_reason')
        ->where('property_uuid', Session::get('property'))
        ->where('moveout_reason','!=', "NA")
        ->groupBy('moveout_reason')
        ->pluck('moveout_reason');
    }

    public function get_reasons_for_moveout_labels()
    {
        return Contract::select(DB::raw('count(*) as count'))
        ->where('property_uuid', Session::get('property'))
        ->where('moveout_reason','!=', "NA")
        ->where('status', 'inactive')
        ->groupBy('moveout_reason')
        ->pluck('count');
    }

    public function get_property_collections($property_uuid)
    {
        return AcknowledgementReceipt::where('property_uuid',$property_uuid)
        ->whereMonth('created_at',date('m'))
        ->sum("amount");
    }

    public function get_bills($property_uuid)
    {
        return Bill::where('property_uuid',$property_uuid)
        ->whereMonth('created_at',date('m'))
        ->sum("bill");
    }


    public function store_timestamps($property_uuid)
    {
        $timestamps = DB::table('timestamps')
        ->where('user_id', auth()->user()->id)
        ->where('property_uuid', $property_uuid)
        ->whereDate('created_at', Carbon::today())
        ->count();

        if($timestamps<=0){ 
            DB::table('timestamps')
              ->insert([
                'user_id' => auth()->user()->id,
                'property_uuid' => $property_uuid,
                'created_at' => now(),
                'ip_address' => request()->ip(),
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */

    public function update_property_note_to_bill($property_uuid, $note)
    {
        return Property::where('uuid',$property_uuid)->update([
            'note_to_bill' => $note,
        ]);
    }

    public function success(Property $property)
    {
        return view('properties.success', [
            'property' => $property
        ]);
    }

    public function show(Property $property)
    {  

        // if(app('App\Http\Controllers\UserController')->is_trial_expired(auth()->user()->trial_ends_at)){
        //     return redirect('/select-a-plan-free');
        // }

        $this->store_property_session($property);

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',1);

        $this->save_unit_stats();

        $occupancy_rate_date = $this->get_occupancy_rate_dates();

        $occupancy_rate_value = $this->get_occupancy_rate_values();

        $current_occupancy_rate = $this->get_current_occupancy_rate($property->uuid);

        $collection_rate_date = $this->get_collection_rate_dates();

        $collection_rate_value = $this->get_collection_rate_values();

        $bill_rate_value = $this->get_bill_rate_values();

        $current_collection_rate = $this->get_current_collection_rate();

        $tenant_type_label = $this->get_tenant_type_labels();

        $tenant_type_value = $this->get_tenant_type_values();

        $tenant_movein_value = $this->get_tenant_movein_values();

        $tenant_movein_label = $this->get_tenant_movein_labels();

        $tenant_moveout_value = $this->get_tenant_moveout_values();

        $reasons_for_moveout_label = $this->get_reasons_for_moveout_labels();

        $reasons_for_moveout_value = $this->get_reasons_for_moveout_values();

        $buildings = PropertyBuilding::where('property_uuid', $property->uuid)->count();

        $owners = Owner::where('property_uuid', $property->uuid);

        $delinquents = $this->get_delinquents();
        

        return view('properties.show',[
            'property' => $property,

            'contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($property->uuid, '', '', '', ''),
            'expired_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($property->uuid, 'inactive', '', '', ''),
            'expiring_contracts' =>app('App\Http\Controllers\ContractController')->get_property_contracts($property->uuid, 'active', Carbon::now()->addMonth(), '', ''),
            'pending_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($property->uuid, 'pendingmoveout', '', '', ''),
            'movingin_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($property->uuid, '', '', Carbon::now()->month, ''),
            'movingout_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($property->uuid, '', '', '', Carbon::now()->month),

            'concerns' =>app('App\Http\Controllers\ConcernController')->get_property_concerns($property->uuid, '', Carbon::now()->month),
            'pending_concerns' => app('App\Http\Controllers\ConcernController')->get_property_concerns($property->uuid, 'pending', Carbon::now()->month),
            'closed_concerns' => app('App\Http\Controllers\ConcernController')->get_property_concerns($property->uuid, 'closed', Carbon::now()->month),


            'payment_requests' => app('App\Http\Controllers\PaymentRequestController')->get_property_payment_requests($property->uuid, 'pending'),

            'roles' => app('App\Http\Controllers\PropertyRoleController')->get_property_user_roles($property->uuid),
            
            'daily_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections($property->uuid, Carbon::today(), Carbon::now()->month)->sum('collection'),
            
            'monthly_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections($property->uuid,Carbon::today(), Carbon::now()->month)->sum('collection'),
          
            'tenants' => app('App\Http\Controllers\TenantController')->get_property_tenants($property->uuid ,Carbon::now()->month),


            'units' => app('App\Http\Controllers\UnitController')->get_property_units($property->uuid, '',Carbon::now()->month),
            'occupied_units' => app('App\Http\Controllers\UnitController')->get_property_units($property->uuid, 2, Carbon::now()->month),
            'vacant_units' => app('App\Http\Controllers\UnitController')->get_property_units($property->uuid, 1,Carbon::now()->month),

            'notifications' => app('App\Http\Controllers\NotificationController')->get_property_notifications($property->uuid),

            'monthly_bills' => app('App\Http\Controllers\BillController')->get_property_bills($property->uuid, Carbon::now()->month()),
            'monthly_unpaid_bills' => app('App\Http\Controllers\BillController')->get_property_unpaid_bills($property->uuid,Carbon::now()->month),
            'total_unpaid_bills' => app('App\Http\Controllers\BillController')->get_property_unpaid_bills($property->uuid,''),
        
            'occupancy_rate_value' => $occupancy_rate_value,
            'occupancy_rate_date' => $occupancy_rate_date,
            'current_occupancy_rate' => $current_occupancy_rate,

          
           
            'collection_rate_date' => $collection_rate_date,
            'collection_rate_value' => $collection_rate_value,
            'current_collection_rate' => $current_collection_rate,
            'bill_rate_value' => $bill_rate_value,
            'tenant_type_label' => $tenant_type_label,
            'tenant_type_value' => $tenant_type_value,
            'tenant_movein_value' => $tenant_movein_value,
            'tenant_movein_label' => $tenant_movein_label,
            'tenant_moveout_value' => $tenant_moveout_value,
            'reasons_for_moveout_label' => $reasons_for_moveout_label,
            'reasons_for_moveout_value' => $reasons_for_moveout_value,
            'delinquents' => $delinquents,
            'owners' => $owners,
            'buildings' => $buildings,
        
          
        ]); 
    }

    public function save_unit_stats()
    {
        $total_units = Property::find(Session::get('property'))->units;

        $vacant_units = $total_units->where('status_id','1')->count();

        $occupied_units = $total_units->where('status_id','2')->count();

        $dirty_units = $total_units->where('status_id','3')->count();

        $reserved_units = $total_units->where('status_id','4')->count();

        $undermaintenance_units = $total_units->where('status_id','5')->count();

        $pending_units = $total_units->where('status_id','6')->count();

        UnitStats::firstOrCreate([
            'total' => $total_units->count(),
            'vacant' => $vacant_units,
            'occupied' => $occupied_units,
            'dirty' => $dirty_units,
            'reserved' => $reserved_units,
            'under_maintenance' => $undermaintenance_units,
            'pending' => $pending_units,
            'property_uuid' => Session::get('property')
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    { 
        return view('properties.edit',[
            'property_details' => $property,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $attributes = request()->validate([
        'property' => ['required', 'string', 'max:255'],
        'description' => ['nullable'],
        'type_id' => ['required', Rule::exists('types', 'id')],
        'thumbnail' => 'image',
        'status' => 'required',
        'tenant_contract' => 'nullable|mimes:pdf',
        'owner_contract' => 'nullable|mimes:pdf',
        ]);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        if(isset($attributes['tenant_contract']))
        {
            $attributes['tenant_contract'] = request()->file('tenant_contract')->store('tenant_contracts');
        }
        
        if(isset($attributes['owner_contract']))
        {
        $attributes['owner_contract'] = request()->file('owner_contract')->store('owner_contracts');
        }

        $property->update($attributes);

        return back()->with('success', 'Property has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        if(!auth()->user()->role_id == '5')
        {
            abort(403);
        }else{
            Unit::where('property_uuid', $uuid)->delete();
            Tenant::where('property_uuid', $uuid)->delete();
            Bill::where('property_uuid', $uuid)->delete();
            Collection::where('property_uuid', $uuid)->delete();
            AcknowledgementReceipt::where('property_uuid', $uuid)->delete();
            Contract::where('property_uuid', $uuid)->delete();
            Property::where('uuid', $uuid)->delete();
            UserProperty::where('property_uuid')->delete();
        
             return redirect('/properties')->with('success','Property is successfully deleted.');
        }
       
    }

    public function show_tenant_contract($uuid)
    {
        return view('properties.show-tenant-contract',[
            'property' => Property::find($uuid),
        ]);
    }

     public function show_owner_contract($uuid)
     {
        return view('properties.show-owner-contract',[
            'property' => Property::find($uuid),
        ]);
     }
}
