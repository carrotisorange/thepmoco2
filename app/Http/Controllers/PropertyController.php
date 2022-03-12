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

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
        ->select('*', 'properties.*','properties.status as property_status', 'properties.uuid as property_uuid',
        DB::raw('count(units.uuid) as unit_count'), 'user_properties.created_at as property_created_at')
        ->join('users', 'user_properties.user_id', 'users.id')
        ->join('types', 'properties.type_id', 'types.id')
        ->leftJoin('units', 'properties.uuid', 'units.property_uuid')
        ->where('users.id', auth()->user()->id)
        ->groupBy('user_properties.property_uuid')
        ->orderBy('properties.created_at', 'desc')
        ->get();

        return view('properties.index',[
            'properties'=>$properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($random_str)
    {
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

        UserProperty::create([
            'property_uuid' => $property_uuid,
            'user_id' => auth()->user()->id,
            'isAccountOwner' => true
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

            //   PropertyRole::create([
            //   'property_uuid' => $property_uuid,
            //   'role_id' => 1,
            //   'hasAcessToTenant' => true,
            //   'hasAcessToDashboard' => true,
            //   'hasAcessToRoom' => true,
            //   'hasAcessToContract' => true,
            //   'hasAcessToOwner' => true,
            //   ]);

            //   PropertyRole::create([
            //   'property_uuid' => $property_uuid,
            //   'role_id' => 2,
            //   'hasAcessToBill' => true,
            //   ]);

            //   PropertyRole::create([
            //   'property_uuid' => $property_uuid,
            //   'role_id' => 3,
            //   'hasAcessToCollection' => true,
            //   ]);

            //   PropertyRole::create([
            //   'property_uuid' => $property_uuid,
            //   'role_id' => 4,
            //   'hasAcessToTenant' => true,
            //   'hasAcessToDashboard' => true,
            //   'hasAcessToRoom' => true,
            //   'hasAcessToContract' => true,
            //   'hasAcessToOwner' => true,
            //   ]);

        DB::commit();

    }catch (\Throwable $e) {
            DB::rollback();
        }

    return redirect('/properties')->with('success', 'New property has been created.');;
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

        return view('properties.show',[
            'property' => $property,
            'roles' => PropertyRole::where('property_uuid',$property->uuid)->get(),
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
        'description' => ['required'],
        'type_id' => ['required', Rule::exists('types', 'id')],
        'thumbnail' => 'image',
        ]);

        if(isset($attributes['thumbnail']))
        {
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
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
    public function destroy(Property $property)
    {
        //
    }
}
