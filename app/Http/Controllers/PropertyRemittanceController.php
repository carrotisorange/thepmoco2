<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Remittance;
use App\Models\DeedOfSale;
use App\Models\Unit;

class PropertyRemittanceController extends Controller
{
    public function index(Property $property){
        return view('properties.remittances.index',[
            'property' => $property,
        ]);
    }

    public function store($property_uuid, $unit_uuid, $ar_no, $particular_id, $tenant_uuid, $date){
        $unit = Unit::find($unit_uuid);
        $owner = DeedOfSale::where('unit_uuid', $unit_uuid)->pluck('owner_uuid')->last();
        Remittance::updateOrCreate(
            [
                'property_uuid' => $property_uuid,
                'unit_uuid' => $unit_uuid,
                'ar_no' => $ar_no,
                'particular_id' => $particular_id,
                'owner_uuid' => $owner,
            ],
            [
            'property_uuid' => $property_uuid,
            'unit_uuid' => $unit_uuid,
            'ar_no' => $ar_no,
            'particular_id' => $particular_id,
            'owner_uuid' => $owner,
            'monthly_rent' => $unit->rent,
            'net_rent' => $unit->rent - ($unit->management_fee + $unit->marketing_fee),
            'management_fee' => $unit->management_fee,
            'marketing_fee' => $unit->marketing_fee,
            'total_deductions' => $unit->management_fee + $unit->marketing_fee,
            'remittance' => $unit->rent - ($unit->management_fee + $unit->marketing_fee),
            'payee_uuid' => $tenant_uuid,
            'created_at' => $date
        ]);
    }
}
