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
use App\Models\Point;
use App\Models\PropertyBuilding;
use App\Models\Status;
use App\Models\Timestamp;
use Illuminate\Support\Facades\Gate;
use App\Models\UnitStats;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::forget('property');
        Session::forget('property_name');

        if(!User::find(Auth::user()->id)->user_properties->count())
        {
            return redirect('/property/'.Str::random(8).'/create');
        }

        Session::forget('property_name');

        if(auth()->user()->role_id == '10')
        {   
            $sessions = DB::table('sessions')
            ->where('user_id','!=' ,auth()->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->get();

            $properties = Property::all();

            $users = User::all();

            $units = Unit::all();

            $tenants = Tenant::all();

            $contracts = Contract::all();

            $points = Point::orderBy('total', 'desc')
            ->selectRaw('sum(point) as total, users.name as name')
            ->leftJoin('users', 'points.user_id', 'users.id')
            ->groupBy('user_id')
            ->paginate(10);

            $properties_count_labels = $this->get_property_rate_dates();

            $users_count_values = $this->get_user_rate_values();

            $properties_count_values = $this->get_property_rate_values();

            $sessions_count_values = $this->get_session_rate_values();

            $get_session_rate_labels = $this->get_session_rate_labels();

            $get_property_type_labels = $this->get_property_type_labels();

            $get_property_type_values = $this->get_property_type_values();

            $get_property_tenant_type_values = $this->get_property_tenant_type_values();

            $get_property_tenant_type_labels = $this->get_property_tenant_type_labels();

            return view('dev.index',[
                'sessions' => $sessions,
                'points' => $points,
                'properties' => $properties,
                'users' => $users,
                'units' => $units,
                'tenants' => $tenants,
                'contracts' => $contracts,
      
                'users_count_values' => $users_count_values,
                'properties_count_labels' => $properties_count_labels,
                'properties_count_values' => $properties_count_values,
                'sessions_count_values' => $sessions_count_values,
                'get_property_type_labels' => $get_property_type_labels,
                'get_property_type_values' => $get_property_type_values,
                'get_property_tenant_type_values' => $get_property_tenant_type_values,
                'get_property_tenant_type_labels' => $get_property_tenant_type_labels,
                'get_session_rate_labels' => $get_session_rate_labels
            ]);
        }elseif(auth()->user()->role_id == '8'){
            return view('portal.tenants.index',[
            'properties'=>User::find(Auth::user()->id)->user_properties
            ]);
        }
        else
        {
            return view('properties.index',[
            'properties'=>User::find(Auth::user()->id)->user_properties
            
            ]);
        }
    }

    public function get_property_rate_dates()
    {
        return Property::select(DB::raw("(count(*)) as total_property"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
               ->latest()
        ->take(31)

        ->pluck('month_year');
    }


    public function get_user_rate_values()
    {
        return User::select(DB::raw("(count(*)) as total_user"),
        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month_year"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
               ->latest()
        ->take(31)

        ->pluck('total_user');
    }

    public function get_property_rate_values()
    {
        return Property::select(DB::raw("(count(*)) as total_property"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(10)
        ->pluck('total_property');
    }

    public function get_session_rate_labels()
    {
        return DB::table('sessions')->select(DB::raw("(count(*)) as total_session"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %D')) as date_year"))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%Y')"))
        ->limit(31)
        ->pluck('date_year');
    }

    public function get_session_rate_values()
    {
        return DB::table('sessions')->select(DB::raw("(count(*)) as total_session"),
        DB::raw("(DATE_FORMAT(created_at,
        '%d %Y')) as date_year"))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%Y')"))
        ->limit(31)
        ->pluck('total_session');
    }
    
    public function get_property_type_labels()
    {
        return Property::
        leftJoin('types', 'properties.type_id', 'types.id')
        ->groupBy('type_id')
        ->pluck('type');
    }

     public function get_property_type_values()
     {
       return Property::select(DB::raw('count(*) as count'))
       ->groupBy('type_id')
       ->pluck('count');
     }

         public function get_property_tenant_type_labels()
         {
         return Tenant
         ::groupBy('type')
         ->pluck('type');
         }

    public function get_property_tenant_type_values()
         {
         return Tenant::select(DB::raw('count(*) as count'))
         ->groupBy('type')
         ->pluck('count');
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
        return $request->all();
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

        UserProperty::create([
            'property_uuid' => $property_uuid,
            'user_id' => auth()->user()->id,
            'is_account_owner' => true
        ]);

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

    public function get_current_occupancy_rate()
    {
        return UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
        DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
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

    public function get_expiring_contracts()
    {
        return Contract::where('end','<=',Carbon::now()->
            addMonth())->where('property_uuid',Session::get('property'))->where('status', 'active')->paginate(5);
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

    public function get_collections($property_uuid)
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
    public function show(Property $property)
    {     
        session(['property' => $property->uuid]);
        session(['property_name' => $property->property]);

        $this->save_unit_stats();

        $occupancy_rate_date = $this->get_occupancy_rate_dates();

        $occupancy_rate_value = $this->get_occupancy_rate_values();

        $current_occupancy_rate = $this->get_current_occupancy_rate();

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

        $collections = $this->get_collections(Session::get('property'));

        $bills = $this->get_bills(Session::get('property'));

        $contracts = app('App\Http\Controllers\ContractController')->index(Session::get('property'))->count();

        $units = Unit::where('property_uuid', $property->uuid)->count();

        $buildings = PropertyBuilding::where('property_uuid', $property->uuid)->count();

        $tenants = Tenant::where('property_uuid', $property->uuid);

        $owners = Owner::where('property_uuid', $property->uuid);

        $concerns = Property::find($property->uuid)->concerns->where('status', 'pending')->count();

        $timestamps = $this->store_timestamps(Session::get('property'));

        $expiring_contracts = $this->get_expiring_contracts();

        $delinquents = $this->get_delinquents();

        return view('properties.show',[
            'property' => $property,
            'roles' => PropertyRole::where('property_uuid',$property->uuid)->get(),
            'collections' => $collections,
            'tenants' => $tenants,
            'units' => $units,
            'concerns' => $concerns,
            'contracts' => $contracts,
            'occupancy_rate_value' => $occupancy_rate_value,
            'occupancy_rate_date' => $occupancy_rate_date,
            'current_occupancy_rate' => $current_occupancy_rate,
            'bills' => $bills,
            'contracts' => $contracts,
            'expiring_contracts' => $expiring_contracts,
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
            'buildings' => $buildings
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
        $property = Property::find($uuid);
        $property->delete();

        return back()->with('success','Property has been removed.');
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
