<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Str;
use Session;
use App\Models\{Unit,Property,Floor,Owner,Collection, Plan};

class UnitController extends Controller
{

    public function index(Property $property, $batch_no=null, $action=null)
    {
        $featureId = 3; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.units.index',[
            'property' => $property,
            'batch_no' => $batch_no,
        ]);
    }

    public function store($numberOfUnitsToBeCreated){

        if(($numberOfUnitsToBeCreated <= 0 || !$numberOfUnitsToBeCreated)){
        return redirect(url()->previous())->with('error', 'Cannot accept value less than 0 or null.');
        }

        $batch_no = Str::random(8);

        $plan_unit_limit =  Plan::find(auth()->user()->plan_id)->description;

        $total_unit_created = Property::find(Session::get('property_uuid'))->units()->count() + 1;

        if($plan_unit_limit <= $total_unit_created){
           return redirect(url()->previous())->with('error', 'You have reached your plan unit limit.');
        }

        for($i=$numberOfUnitsToBeCreated; $i>=1; $i--){
            Unit::create([
                'uuid' => Str::uuid(),
                'unit' => 'Unit '.$total_unit_created++,
                'building_id' => '1',
                'floor_id' => '1',
                'property_uuid' => Session::get('property_uuid'),
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]);
        }
    }

    public function getOccupancyPieChartValues(){
        return Unit::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('count(*) as unit_count, status'))
        ->join('statuses', 'units.status_id', 'statuses.id')
        ->groupBy('units.status_id')
        ->orderBy('status')
        ->limit(3);
    }

    public function getBillPieChartValues(){
        return Unit::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('count(*) as unit_count', 'status'))
        ->join('statuses', 'units.status_id', 'statuses.id')
        ->groupBy('units.status_id')
        ->orderBy('status')
        ->limit(3)
        ->pluck('unit_count');
    }

      public function show(Property $property, Unit $unit, $action=null)
    {
        $featureId = 3;

        $restrictionId = 2;

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.units.show',[
            'property' => $property,
            'unit_details' => $unit,
            'deed_of_sales' => app('App\Http\Controllers\Subfeatures\DeedOfSaleController')->show_unit_deed_of_sales($unit->uuid),
        ]);

    }

        public function update_unit_occupancy_info(Property $property, Unit $unit, Owner $owner)
        {
            return view('occupancy.create',[
            'unit' => $unit,
            'owner' => $owner,
            ]);
        }


     public function edit(Property $property, $batch_no)
    {
        return view('features.units.edit-bulk',[
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

    public function get($status=null, $groupBy=null)
    {
        return Unit::getAll(Session::get('property_uuid'), $status, $groupBy);
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

        return redirect(url()->previous())->with('success', 'Changes Saved!');
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
