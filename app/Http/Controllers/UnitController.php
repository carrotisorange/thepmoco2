<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\Rule;
use App\Models\Floor;
use DB;
use App\Models\Owner;

use App\Models\Collection;

class UnitController extends Controller
{
    public function update_unit_occupancy_info(Property $property, Unit $unit, Owner $owner)
    {
        return view('occupancy.create',[
            'unit' => $unit,
            'owner' => $owner,
        ]);
    }

    public function quick_add(){
       session(['quick_add' => true]);

       return redirect('/property/'.Session::get('property').'/unit');
    }


    public function get_property_unit_floors($property_uuid)
    {
        return Floor::join('units', 'floors.id', 'units.floor_id')
        ->select('floor','floors.id as floor_id', DB::raw('count(*) as count'))
          ->where('units.property_uuid', $property_uuid)
           ->where('floors.floor','!=','NA')
           ->groupBy('floors.id')
          ->get();
    }

    public function get_property_unit_rents($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('rent', DB::raw('count(*) as count'))
        ->where('rent','>',0)
        ->groupBy('rent')
        ->get();
    }
    
    public function get_property_unit_discounts($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('discount', DB::raw('count(*) as count'))
        ->where('discount','>',0)
        ->groupBy('discount')
        ->get();
    }

       
    public function get_property_unit_sizes($property_uuid)
    { 
        return Unit::where('units.property_uuid', $property_uuid)
          ->whereNotNull('size')
         ->select('size', DB::raw('count(*) as count'))
          ->where('size','>',0)
          ->groupBy('size')
          ->get();
    }

    public function get_property_unit_occupancies($property_uuid)
    { 
        return Unit::where('units.property_uuid', $property_uuid)
        ->whereNotNull('occupancy')
        ->select('occupancy', DB::raw('count(*) as count'))
        ->where('occupancy','>',0)
        ->groupBy('occupancy')
        ->get();
    }

    public function get_property_unit_enrollment_statuses($property_uuid)
    { 
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('is_enrolled', DB::raw('count(*) as count'))
        ->groupBy('is_enrolled')
        ->orderBy('is_enrolled', 'desc')
        ->get();
    }

    public function get_property_units($property_uuid, $status, $duration, $unlisted)
    {
        return Unit::where('property_uuid', $property_uuid)
         ->when($status, function ($query) use ($status) {
         $query->where('status_id', $status);
         })
        ->when($duration, function ($query) use ($duration) {
          $query->whereMonth('updated_at', $duration);
          })
        ->when($unlisted, function ($query) use ($unlisted) {
           $query->whereMonth('is_the_unit_for_rent_to_tenant', $unlisted);
           });
    }

    public function store(Property $property, Request $request, $batch_no)
    {   

    }

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

        return back()->with('success', 'Success!');
    }

    public function update_unit_status($unit_uuid, $status_id)
    {
        Unit::where('uuid', $unit_uuid)
        ->update([
           'status_id' => $status_id
        ]);
    }

    public function destroy(Property $property, Unit $unit)
    {

        $tenants = Unit::find($unit->uuid)->contracts()->count();

        $owners = Unit::find($unit->uuid)->deed_of_sales()->count();

        if($tenants || $owners)
        {
            return back()->with('error', 'This unit cannot be deleted!');
        }else{
            Unit::where('uuid', $unit->uuid)->delete();

            return redirect('/property/'.Session::get('property').'/unit')->with('success', 'Success!');
        }
       
    }

    public function get_unit_collections($property_uuid, $unit_uuid){
        return Collection::
        select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('property_uuid', $property_uuid)
        ->where('unit_uuid', $unit_uuid)
        ->where('is_posted', 1)
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();
    }
}
