<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use App\Models\{Property,Remittance,DeedOfSale,Unit,Bank};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function store($collection){

        $unit = Unit::where('unit',$collection->unit->uuid);
        $owner_uuid = DeedOfSale::where('unit_uuid', $collection->unit->uuid)->value('owner_uuid');
        $bank_name = Bank::where('owner_uuid', $owner_uuid)->value('bank_name');
        $account_number = Bank::where('owner_uuid', $owner_uuid)->value('account_number');
        $account_name = Bank::where('owner_uuid', $owner_uuid)->value('account_name');
        $managementFee =  app('App\Http\Controllers\PropertyController')->getManagementFee($collection->collection, $collection->description);

        try{
            DB::beginTransaction();

            $remittance = Remittance::updateOrCreate(
            [
                'property_uuid' => $collection->property_uuid,
                'unit_uuid' => $collection->unit->uuid,
                'ar_no' => $collection->ar_no,
                'particular_id' => $collection->bill->particular_id,
                'owner_uuid' => $owner_uuid,
            ],
            [
            'property_uuid' => $collection->property_uuid,
            'unit_uuid' => $collection->unit->uuid,
            'ar_no' => $collection->ar_no,
            'particular_id' => $collection->bill->particular_id,
            'owner_uuid' => $owner_uuid,
            'monthly_rent' => $collection->collection,
            'net_rent' => $collection->collection - ($managementFee + $unit->value('marketing_fee')),
            'management_fee' => $managementFee,
            'marketing_fee' => $unit->value('marketing_fee'),
            'total_deductions' => $managementFee + $unit->value('marketing_fee'),
            'remittance' => $collection->rent - ($managementFee + $unit->value('marketing_fee')),
            'tenant_uuid' => $collection->tenant_uuid,
            'guest_uuid' => $collection->guest_uuid,
            'account_name' => $account_name,
            'account_number' => $account_number,
            'created_at' => $collection->created_at,
            'bank_name' => $bank_name
        ]);

            DB::commit();
            Log::info('inserted remittance id: '. $remittance->id);

        }catch(\Exception $e)
        {
            DB::rollBack();
            Log::error($e);
            return redirect(url()->previous())->with('error', $e);
        }
    }

    public function show(Property $property, Unit $unit){

        return view('properties.remittances.show', [
            'unit' => $unit
        ]);
    }

    public function update($id, $remittance){

        try{
            DB::beginTransaction();

            Remittance::where('id', $id)
            ->update([
                'management_fee' => $remittance->management_fee,
                'bank_transfer_fee' => $remittance->bank_transfer_fee,
                'miscellaneous_fee' => $remittance->miscellaneous_fee,
                'membership_fee' => $remittance->membership_fee,
                'condo_dues' => $remittance->condo_dues,
                'parking_dues' => $remittance->parking_dues,
                'water' => $remittance->water,
                'electricity' => $remittance->electricity,
                'surcharges' => $remittance->surcharges,
                'building_insurance' => $remittance->building_insurance,
                'real_property_tax' => $remittance->real_property_tax,
                'generator_share' => $remittance->generator_share,
                'housekeeping_fee' => $remittance->housekeeping_fee,
                'laundry_fee' => $remittance->laundry_fee,
                'complimentary' => $remittance->complimentary,
                'internet' => $remittance->internet,
                'special_assessment' => $remittance->special_assessment,
                'materials_recovery_facility' => $remittance->materials_recovery_facility,
                'recharge_of_fire_extinguisher' => $remittance->recharge_of_fire_extinguisher,
                'environmental_fee' => $remittance->environmental_fee,
                // 'bladder_tank' => $remittance->bladder_tank,
                // 'cause_of_magnet' => $remittance->cause_of_magnet,
                'total_deductions' => $remittance->management_fee + $remittance->marketing_fee + $remittance->bank_transfer_fee + $remittance->miscellaneous_fee + $remittance->membership_fee + $remittance->condo_dues
                + $remittance->parking_dues + $remittance->water + $remittance->electricity + $remittance->surcharges + $remittance->building_insurance
                + $remittance->real_property_tax + $remittance->housekeeping_fee + $remittance->laundry_fee + $remittance->complimentary + $remittance->internet
                + $remittance->special_assessment + $remittance->materials_recovery_facility + $remittance->recharge_of_fire_extinguisher + $remittance->recharge_of_fire_extinguisher
                + $remittance->environmental_fee,
                'remittance' => $remittance->monthly_rent - ($remittance->management_fee + $remittance->marketing_fee + $remittance->bank_transfer_fee + $remittance->miscellaneous_fee + $remittance->membership_fee + $remittance->condo_dues
                + $remittance->parking_dues + $remittance->water + $remittance->electricity + $remittance->surcharges + $remittance->building_insurance
                + $remittance->real_property_tax + $remittance->housekeeping_fee + $remittance->laundry_fee + $remittance->complimentary + $remittance->internet
                + $remittance->special_assessment + $remittance->materials_recovery_facility + $remittance->recharge_of_fire_extinguisher + $remittance->recharge_of_fire_extinguisher
                + $remittance->environmental_fee),
                'cv_no' => $remittance->cv_no,
                'check_no' => $remittance->check_no
            ]);

            DB::commit();
            Log::info('updated remittance id: '. $remittance->id);

        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return redirect(url()->previous())->with('error', $e);
        }
    }

    public function export($propertyUuid, $date, $bank_transfer_fee=null){

       $data = [
                'remittances' => Remittance::where('property_uuid', Session::get('property_uuid'))
                ->whereMonth('created_at', Carbon::parse($date)->month)
                ->whereYear('created_at', Carbon::parse($date)->year)
                ->get(),

                'date' => $date,
            ];

            $folder_path = 'features.remittances.export';

            $perspective = 'landscape';

            $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);            ;

            $pdf_name = str_replace(' ', '_', Session::get('property')).'_'.str_replace(' ', '_', Carbon::parse($date)->format('M Y')).'_remittances.pdf';

            return $pdf->stream($pdf_name);
    }

    public function exportUnitRemittance($propertyUuid, $unitUuid, $remittanceId){

        $remittance = Remittance::find($remittanceId);

        $data = [
            'remittance' => $remittance,
        ];

        $folder_path = 'features.remittances.exportUnitRemittance';

        $perspective = 'landscape';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective); ;

        $pdf_name = str_replace(' ', '_', $remittance->unit->unit).'_'.str_replace(' ', '_',Carbon::parse($remittance->created_at)->format('M Y')).'_remittance.pdf';

        return $pdf->stream($pdf_name);
    }
}
