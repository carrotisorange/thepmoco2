<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Str;
use App\Models\{Unit,Property,Utility,Contract,DeedOfSale};

class UnitBillController extends Controller
{

    public function index(Property $property, Unit $unit)
    {
         return view('features.units.bills.index',[
         'unit' => $unit,
          'bills' => app('App\Http\Controllers\Features\BillController')->show_unit_bills($unit->uuid),
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
        return view('features.units.bills.create',[
            'property' => $property,
            'unit' => $unit,
            'type' => $type,
            'utility' => $utility
        ]);
    }

    public function success(Property $property, Unit $unit, $type, Utility $utility){
        return view('features.units.bills.success', [
            'unit' => $unit,
            'utility' => $utility
        ]);
    }

    public function edit(Property $property, Unit $unit, Utility $utility){
        return view('features.units.bills.edit',[
            'property' => $property,
            'unit' => $unit,
            'utility' => $utility
        ]);
    }
}
