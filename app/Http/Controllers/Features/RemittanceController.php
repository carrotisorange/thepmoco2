<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use App\Models\{Property,Remittance,DeedOfSale,Unit,Bank};

class RemittanceController extends Controller
{
    public function index(Property $property){

        $featureId = 16; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.remittances.index',[
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

    public function export($propertyUuid, $date, $bank_transfer_fee=null){

       $data = [
                'remittances' => Remittance::where('property_uuid', Session::get('property_uuid'))
                ->whereMonth('created_at', Carbon::parse($date)->month)
                ->whereYear('created_at', Carbon::parse($date)->year)
                ->get(),

                'date' => $date,
                'bank_transfer_fee' => $bank_transfer_fee
            ];

            $folder_path = 'features.remittances.export';

            $perspective = 'landscape';

            $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);            ;

            $pdf_name = str_replace(' ', '_', Session::get('property')).'_'.str_replace(' ', '_', Carbon::parse($date)->format('M Y')).'_remittances.pdf';

            return $pdf->stream($pdf_name);
    }
}
