<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Property::find(Session::get('property'))->acknowledgementreceipts;

        return view('collections.index',[
            'collections'=> $collections,
        ]);
    }

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
}
