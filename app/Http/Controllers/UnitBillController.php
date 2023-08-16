<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use App\Models\Utility;
use App\Models\Contract;
use App\Models\DeedOfSale;
use Session;
use Illuminate\Support\Str;

class UnitBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Unit $unit)
    {
         return view('units.bills.index',[
         'unit' => $unit,
          'bills' => app('App\Http\Controllers\BillController')->show_unit_bills($unit->uuid),
          'view' => 'listView',
          'isPaymentAllowed' => false,
          'isIndividualView' => true,
          'unit_uuid' => $unit->uuid,
          'user_type' => 'unit'
         ]);
    }

    public function create(Property $property, Unit $unit, $type, Utility $utility){

        if($type === 'tenant'){
            $contracts = Contract::where('unit_uuid', $unit->uuid)->where('status', 'active')->count();

            if($contracts <= 0){
                return redirect("/property/".Session::get('property_uuid').'/unit/'.$unit->uuid.'/tenant/'.Str::random(8).'/create');
            }   
        }elseif($type==='owner'){
            $deedofsales = DeedOfSale::where('unit_uuid', $unit->uuid)->where('status', 'active')->count();

            if($deedofsales <=0){
                return redirect("/property/".Session::get('property_uuid').'/unit/'.$unit->uuid.'/owner/'.Str::random(8).'/create');
            }
        }
        return view('units.bills.create',[
            'property' => $property,
            'unit' => $unit, 
            'type' => $type,
            'utility' => $utility
        ]);
    }

    public function success(Property $property, Unit $unit, $type, Utility $utility){
        return view('units.bills.success', [
            'unit' => $unit,
            'utility' => $utility
        ]);
    }

    public function edit(Property $property, Unit $unit, Utility $utility){
        return view('units.bills.edit',[
            'property' => $property,
            'unit' => $unit,
            'utility' => $utility
        ]);
    }
}
