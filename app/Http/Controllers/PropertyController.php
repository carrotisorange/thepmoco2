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
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Tenant;
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

        UnitStats::where('property_uuid', Session::get('property'))->groupBy()->get();

        //$this->occupancy_rate();

        $collections = Property::find($property->uuid)->collections->sum("collection");
        $units = Property::find($property->uuid)->units->count();
        $tenants = Property::find($property->uuid)->tenants->count();
        $concerns = Property::find($property->uuid)->concerns->count();


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

        $contracts =Contract::where('end','<=',Carbon::now()->addMonth())->where('property_uuid',Session::get('property'))->where('status', 'active')->get();


        return view('properties.show',[
            'property' => $property,
            'roles' => PropertyRole::where('property_uuid',$property->uuid)->get(),
            'collections' => $collections,
            'tenants' => $tenants,
            'units' => $units,
            'concerns' => $concerns,
            'contracts' => $contracts
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
