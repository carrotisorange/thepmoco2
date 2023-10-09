<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Floor;
use DB;
use App\Models\Owner;
use Session;

use App\Models\Collection;

class UnitController extends Controller
{

      public function show(Property $property, Unit $unit, $action=null)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens one',2);

        return view('units.show',[
            'property' => $property,
            'unit_details' => $unit,
            'deed_of_sales' => app('App\Http\Controllers\DeedOfSaleController')->show_unit_deed_of_sales($unit->uuid),
        ]);

    }

        public function update_unit_occupancy_info(Property $property, Unit $unit, Owner $owner)
        {
            ddd('asad');
            return view('occupancy.create',[
            'unit' => $unit,
            'owner' => $owner,
            ]);
        }


     public function edit(Property $property, $batch_no)
    {
        return view('units.edit-bulk',[
            'property' => $property,
            'batch_no' => $batch_no,
        ]);
    }

    public function index(Property $property, $batch_no=null, $action=null)
    {
        app('App\Http\Controllers\PropertyController')->store_property_session($property->uuid);

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted(3, auth()->user()->id)){
            return abort(403);
         }

        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');


        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',2);

        return view('properties.units.index',[
            'property' => $property,
            'batch_no' => $batch_no,
        ]);
    }

    public function updateUnitOccupancyInfo(Property $property, Unit $unit, Owner $owner)
    {
        return view('occupancy.create',[
            'unit' => $unit,
            'owner' => $owner,
        ]);
    }

    public function quickAdd(){
       session(['quick_add' => true]);

       return redirect('/property/'.Session::get('property_uuid').'/unit');
    }


    public function getUnitFloors($property_uuid)
    {
        return Floor::join('units', 'floors.id', 'units.floor_id')
        ->select('floor','floors.id as floor_id', DB::raw('count(*) as count'))
          ->where('units.property_uuid', $property_uuid)
           ->where('floors.floor','!=','NA')
           ->groupBy('floors.id')
          ->get();
    }

    public function getUnitRents($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('rent', DB::raw('count(*) as count'))
        ->where('rent','>',0)
        ->groupBy('rent')
        ->get();
    }

    public function getUnitDiscounts($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('discount', DB::raw('count(*) as count'))
        ->where('discount','>',0)
        ->groupBy('discount')
        ->get();
    }


    public function getUnitSizes($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
          ->whereNotNull('size')
         ->select('size', DB::raw('count(*) as count'))
          ->where('size','>',0)
          ->groupBy('size')
          ->get();
    }

    public function getUnitOccupancies($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->whereNotNull('occupancy')
        ->select('occupancy', DB::raw('count(*) as count'))
        ->where('occupancy','>',0)
        ->groupBy('occupancy')
        ->get();
    }

    public function getUnitEnrollmentStatuses($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('is_enrolled', DB::raw('count(*) as count'))
        ->groupBy('is_enrolled')
        ->orderBy('is_enrolled', 'desc')
        ->get();
    }

    public function getUnits($property_uuid)
    {
        return Property::find($property_uuid)->units();

    }


    // public function getUnits($property_uuid, $status, $duration, $unlisted)
    // {
    //     return Unit::where('property_uuid', $property_uuid)
    //      ->when($status, function ($query) use ($status) {
    //      $query->where('status_id', $status);
    //      })
    //     ->when($duration, function ($query) use ($duration) {
    //       $query->whereMonth('updated_at', $duration);
    //       })
    //     ->when($unlisted, function ($query) use ($unlisted) {
    //        $query->whereMonth('is_the_unit_for_rent_to_tenant', $unlisted);
    //        });
    // }

    public function update(Request $request, Property $property, Unit $unit)
    {
        $attributes = request()->validate([
        'unit' => ['required', 'string', 'max:255'],
        'building_id' => [Rule::exists('property_buildings', 'id')],
        'floor_id' => ['required', Rule::exists('floors', 'id')],
         'status_id' => ['required', Rule::exists('statuses', 'id')],
        'category_id' => ['required', Rule::exists('categories', 'id')],
        'thumbnail' => 'image',
        'size' => 'required',
        'rent' => 'required',
         'discount' => 'required',
        'occupancy' => 'required'
        ]);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $unit->update($attributes);

        return back()->with('success', 'Changes Saved!');
    }

    public function updateUnitStatus($unit_uuid, $status_id)
    {
        Unit::where('uuid', $unit_uuid)
        ->update([
           'status_id' => $status_id
        ]);
    }

    public function destroy($unit_uuid){
        Unit::where('uuid', $unit_uuid)->delete();
    }

    public function getCollections($property_uuid, $unit_uuid){
        return Collection::
        select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('property_uuid', $property_uuid)
        ->where('unit_uuid', $unit_uuid)

        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->posted()
        ->get();
    }
}
