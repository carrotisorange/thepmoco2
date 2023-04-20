<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use PDF;
use Carbon\Carbon;

class PropertyCollectionController extends Controller
{
    public function index(Property $property)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',11);
        
        $this->authorize('is_account_receivable_read_allowed');
    
        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);
        
        $collections = Property::find(Session::get('property'))->acknowledgementreceipts;

        return view('properties.collections.index',[
          'property' => $property,
           'collections'=> $collections,
        ]);
    }

    public function export_dcr(Property $property, $date){

        $collections = Property::find($property->uuid)->collections()->whereDate('updated_at', $date)->orderBy('ar_no')->get();

        $data = [
            'collections' => $collections,
            'date' => $date
        ];


        $pdf = \PDF::loadView('properties.collections.export_dcr', $data)->setPaper('a4', 'landscape');;

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, substr_replace($property->property, "", 18), null, 50,
         array(0,0,0),1,1,-30);

        return $pdf->download($property->property.'-'.Carbon::parse($date)->format('M d,Y').'-dcr.pdf');
    }
}
