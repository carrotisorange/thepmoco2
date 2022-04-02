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

use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

            $points = DB::table('points')
           ->leftJoin('users', 'points.user_id', 'users.id')
           ->leftJoin('actions', 'points.action_id', 'actions.id')
           ->leftJoin('properties', 'points.property_uuid', 'properties.uuid')
           ->groupBy('points.id')
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
        }else
        {
            $properties = UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
            ->select('*', 'properties.*','properties.status as property_status', 'properties.uuid as property_uuid',
            DB::raw('count(units.uuid) as units_count'),DB::raw('count(tenants.uuid) as
            tenants_count'),'user_properties.created_at as property_created_at', 'types.type as property_type')
            ->leftJoin('users', 'user_properties.user_id', 'users.id')
            ->leftJoin('types', 'properties.type_id', 'types.id')
            ->leftJoin('units', 'properties.uuid', 'units.property_uuid')
            ->leftJoin('tenants', 'properties.uuid', 'tenants.property_uuid')
            ->where('users.id', auth()->user()->id)
            //->orWhere('users.account_owner_id', auth()->user()->id)
            ->groupBy('user_properties.property_uuid')
            ->orderBy('properties.created_at', 'desc')
            ->get();


            return view('properties.index',[
            'properties'=>$properties,
            
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
        $this->authorize('accountowner');
        
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

        $collections = Property::find($property->uuid)->collections->sum("collection");
        $units = Property::find($property->uuid)->units->count();
        $tenants = Property::find($property->uuid)->tenants->count();
        $concerns = Property::find($property->uuid)->concerns->count();

        $contracts = Contract::join('tenants', 'tenant_uuid', 'tenants.uuid')
          ->select('*', 'contracts.status as contract_status', 'contracts.uuid as contract_uuid')
        ->join('units', 'unit_uuid', 'units.uuid')
        ->where('tenants.property_uuid', Session::get('property'))
        ->where('end', '<=', Carbon::now()->addMonth())
        ->where('contracts.status', 'active')
        ->orderBy('end', 'asc')
        ->get();


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $this->authorize('accountowner');
        
         session(['property' => $property->uuid]);
         session(['property_name' => $property->property]);
         
        return view('properties.edit',[
            'property' => $property,
            'types' => Type::all(),
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
