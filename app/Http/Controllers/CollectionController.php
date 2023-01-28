<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Wallet;

class CollectionController extends Controller
{

    public function get_property_collections($property_uuid, $daily, $monthly)
    {
        return Property::find($property_uuid)->collections()
         ->when($daily, function ($query) use ($daily) {
          $query->whereDate('updated_at', $daily);
        })
         ->when($monthly, function ($query) use ($monthly) {
          $query->whereMonth('updated_at', $monthly);
        })
        
        ->get();
    }
    
    public function update($ar_no, $bill_id, $collection, $form)
    {

       Collection::where('bill_id', $bill_id)
         ->update([
          'ar_no' => $ar_no,
          'collection' => $collection,
          'form' => $form,
          'is_posted' => true
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
}
