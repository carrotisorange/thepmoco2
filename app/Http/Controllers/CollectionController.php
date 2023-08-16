<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Bill;

class CollectionController extends Controller
{

    public function get_property_collections($property_uuid, $daily, $monthly)
    {
        return Collection::where('property_uuid',$property_uuid)
         ->when($daily, function ($query) use ($daily) {
          $query->whereDate('updated_at', $daily);
        })
         ->when($monthly, function ($query) use ($monthly) {
          $query->whereMonth('updated_at', $monthly);
        })
        ->posted()
        ->get();
    }
    
    public function update($ar_no, $bill_id, $collection, $form, $created_at)
    {
        $bill = Bill::find($bill_id);

        if($bill->particular_id == 2 || $bill->particular_id == 3){
            Bill::where('id', $bill_id)
            ->update([
                'bill' => -$bill->bill
            ]);
        }

        Collection::where('bill_id', $bill_id)
         ->update([
          'ar_no' => $ar_no,
          'collection' => $collection,
          'form' => $form,
          'is_posted' => true,
          'created_at' => $created_at
        ]);
    }

    function shortNumber($number = null)
    {
        if($number == 0) {
            $short = '0.00';
        } elseif($number <= 999) {
            $short = $number;
        } elseif($number < 1000000) {
            $short = round($number/1000, 2).'K';
        } elseif($number < 1000000000) {
            $short =  round($number/1000000, 2).'M';
        } elseif($number >= 1000000000) {
            $short = round($number/1000000000, 2).'B';
        }
        
        return $short;
    }

    public function divNumber($numerator, $denominator)
    {
       return $denominator == 0 ? 0 : ($numerator / $denominator);
    }

    public function store($tenant_uuid,$owner_uuid, $guest_uuid, $unit_uuid, $property_uuid, $bill_id, $bill_reference_no, $form, $collection, $collection_batch_no, $collection_ar_no, $is_posted){
    
        return Collection::insertGetId([
            'tenant_uuid' => $tenant_uuid,
            'owner_uuid' => $owner_uuid,
            'guest_uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'property_uuid' => $property_uuid,
            'user_id' => auth()->user()->id,
            'bill_id' => $bill_id,
            'bill_reference_no' => $bill_reference_no,
            'form' => $form,
            'collection' => $collection,
            'batch_no' => $collection_batch_no,
            'ar_no' => $collection_ar_no,
            'is_posted' => $is_posted,
            'created_at' => Carbon::now(),
        ]);
    }

    public function delete_unposted_collections($tenant_uuid, $batch_no){
        Collection::where('tenant_uuid', $tenant_uuid)
        ->where('is_posted', 0)
        ->where('batch_no', '!=', $batch_no)
        ->forceDelete();
    }
}
