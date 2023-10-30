<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Remittance;
use App\Models\DeedOfSale;
use App\Models\Unit;
use App\Models\Bank;

class RemittanceController extends Controller
{
    public function index(Property $property){

        $featureId = 16;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$restrictionId,$featureId);

        return view('properties.remittances.index',[
            'property' => $property,
        ]);
    }

    public function store($property_uuid, $unit_uuid, $ar_no, $particular_id, $tenant_uuid, $guest_uuid, $date, $rent){
        $unit = Unit::find($unit_uuid);
        $owner_uuid = DeedOfSale::where('unit_uuid', $unit_uuid)->value('owner_uuid');
        $bank_name = Bank::where('owner_uuid', $owner_uuid)->value('bank_name');
        $account_number = Bank::where('owner_uuid', $owner_uuid)->value('account_number');
        $account_name = Bank::where('owner_uuid', $owner_uuid)->value('account_name');

        Remittance::updateOrCreate(
            [
                'property_uuid' => $property_uuid,
                'unit_uuid' => $unit_uuid,
                'ar_no' => $ar_no,
                'particular_id' => $particular_id,
                'owner_uuid' => $owner_uuid,
            ],
            [
            'property_uuid' => $property_uuid,
            'unit_uuid' => $unit_uuid,
            'ar_no' => $ar_no,
            'particular_id' => $particular_id,
            'owner_uuid' => $owner_uuid,
            'monthly_rent' => $rent,
            'net_rent' => $rent - ($unit->management_fee + $unit->marketing_fee),
            'management_fee' => $unit->management_fee,
            'marketing_fee' => $unit->marketing_fee,
            'total_deductions' => $unit->management_fee + $unit->marketing_fee,
            'remittance' => $rent - ($unit->management_fee + $unit->marketing_fee),
            'tenant_uuid' => $tenant_uuid,
            'guest_uuid' => $guest_uuid,
            'created_at' => $date,
            'account_name' => $account_name,
            'account_number' => $account_number,
            'bank_name' => $bank_name
        ]);
    }

    public function show(Property $property, Unit $unit){

        return view('properties.remittances.show', [
            'unit' => $unit
        ]);
    }
}
