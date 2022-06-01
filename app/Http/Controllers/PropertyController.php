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
use App\Models\AcknowledgementReceipt;
use App\Models\Unit;
use App\Models\Point;
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
            ->get();

            return view('dev.index',[
                'sessions' => $sessions,
                'points' => $points,
                'properties' => $properties,
                'users' => $users,
                'units' => $units,
                'tenants' => $tenants,
                'contracts' => $contracts
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


        $occupancy_rate_date = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'), DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M')) as month_year"))
          ->where('property_uuid', Session::get('property'))
          ->orderBy('created_at')
          ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
          ->limit(6)
          ->pluck('month_year');

        $occupancy_rate_value = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
           DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M')) as month_year"))
           ->where('property_uuid', Session::get('property'))
           ->orderBy('created_at')
           ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
           ->limit(6)
           ->pluck('occupancy_rate');

           $current_occupancy_rate = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
           DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M')) as month_year"))
           ->where('property_uuid', Session::get('property'))
           ->orderBy('created_at')
           ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
           ->get()
           ->last();

           $collection_rate_date = AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"), DB::raw("(DATE_FORMAT(created_at,
             '%M')) as month_year"))
                   ->where('property_uuid', Session::get('property'))
             ->orderBy('created_at')
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
             ->limit(6)
             ->pluck('month_year');


        $collection_rate_value = AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"), DB::raw("(DATE_FORMAT(created_at,
             '%M')) as month_year"))
                   ->where('property_uuid', Session::get('property'))
             ->orderBy('created_at')
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
             ->limit(6)
             ->pluck('total_amount');


        $bill_rate_value = Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
             ->orderBy('created_at')
                   ->where('property_uuid', Session::get('property'))
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
             ->limit(6)
             ->pluck('total_bill');

        if(Bill::where('property_uuid', Session::get('property'))->count())
        {
             $current_collection_rate = AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"),
             DB::raw("(DATE_FORMAT(created_at,
             '%M')) as month_year"))
             ->where('property_uuid', Session::get('property'))
             ->orderBy('created_at')
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
             ->pluck('total_amount')
             ->last() / Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as
             month_year"))
             ->orderBy('created_at')
             ->where('property_uuid', Session::get('property'))
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
             ->pluck('total_bill')
             ->last() * 100;
        }else{
                $current_collection_rate = 0;
        }

        
    

        $tenant_type_label = Tenant::
         where('property_uuid', Session::get('property'))
         ->groupBy('type')
         ->pluck('type');

         $tenant_type_value = Tenant::select(DB::raw('count(*) as count'))
         ->where('property_uuid', Session::get('property'))
         ->groupBy('type')
         ->pluck('count');

         $tenant_movein_value = Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M')) as month_year"))
          ->orderBy('start')
          ->groupBy(DB::raw("DATE_FORMAT(start, '%m-%Y')"))
          ->limit(7)
          ->pluck('count');

         $tenant_movein_label = Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
          '%M')) as month_year"))
          ->orderBy('start')
          ->groupBy(DB::raw("DATE_FORMAT(start, '%m-%Y')"))
               ->limit(7)
          ->pluck('month_year');

        $tenant_moveout_value = Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(moveout_at,
          '%M')) as month_year"))
          ->orderBy('moveout_at')
          ->groupBy(DB::raw("DATE_FORMAT(moveout_at, '%m-%Y')"))
          ->limit(7)
          ->pluck('month_year');


        $reasons_for_moveout_label = Contract::select('moveout_reason')
        ->where('property_uuid', Session::get('property'))
        ->where('moveout_reason','!=', "NA")
        ->groupBy('moveout_reason')
        ->pluck('moveout_reason');

        $reasons_for_moveout_value = Contract::select(DB::raw('count(*) as count'))
         ->where('property_uuid', Session::get('property'))
         ->where('moveout_reason','!=', "NA")
         ->groupBy('moveout_reason')
         ->pluck('count');

        //return $tenant_background  = Tenant::select(DB::raw('count(type)'))->where('property_uuid',$property->uuid)->groupBy('type')->get();

        $this->occupancy_rate();

        $collections = AcknowledgementReceipt::where('property_uuid',$property->uuid)
        ->whereMonth('created_at',date('m'))
        ->sum("amount");

        $bills = Bill::where('property_uuid',$property->uuid)
        ->whereMonth('created_at',date('m'))
        ->sum("bill");

        $contracts = Contract::where('property_uuid', Session::get('property'))->where('status', 'active')->count();

        $units = Property::find($property->uuid)->units->count();
        $tenants = Property::find($property->uuid)->tenants->count();
        $concerns = Property::find($property->uuid)->concerns->where('status', 'pending')->count();


            $timestamps = DB::table('timestamps')
            ->where('user_id', auth()->user()->id)
            ->where('property_uuid', $property->uuid)
            ->whereDate('created_at', Carbon::today())
            ->count();

            if($timestamps<=0) { DB::table('timestamps')->insert(
                [
                'user_id' => auth()->user()->id,
                'property_uuid' => $property->uuid,
                'created_at' => now(),
                'ip_address' => request()->ip(),
                ]
                );
                }

        $expiring_contracts =Contract::where('end','<=',Carbon::now()->addMonth())->where('property_uuid',Session::get('property'))->where('status', 'active')->paginate(5);


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
            'reasons_for_moveout_value' => $reasons_for_moveout_value
        ]); 
    }

    public function occupancy_rate()
    {
        $total_units = Property::find(Session::get('property'))->units;

        $vacant_units = $total_units->where('status_id','1')->count();

        $occupied_units = $total_units->where('status_id','2')->count();

        $dirty_units = $total_units->where('status_id','3')->count();

        $reserved_units = $total_units->where('status_id','4')->count();

        $undermaintenance_units = $total_units->where('status_id','5')->count();

        $pending_units = $total_units->where('status_id','6')->count();

        UnitStats::create([
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
        $this->authorize('manager');
        
         session(['property' => $property->uuid]);
         session(['property_name' => $property->property]);
         
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
