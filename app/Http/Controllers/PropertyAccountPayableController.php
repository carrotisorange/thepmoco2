<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use Carbon\Carbon;

class PropertyAccountPayableController extends Controller
{
    public function index(Property $property, $status=null)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',17);

        return view('properties.accountpayables.index',[
            'accountpayables' => Property::find($property->uuid)->accountpayables()
               ->when($status, function ($query) use ($status) {
               $query->where('status', $status);
               })->orderBy('created_at', 'desc')->get(),
            'property' => $property
        ]);
    }

    public function get_accountpayables($property_uuid, $status, $created_at, $request_for, $limitDisplayTo){

        return Property::find(Session::get('property'))->accountpayables()
     
        ->when($status, function ($query, $status) {
        $query->where('status', $status);
        })
        ->when(($created_at), function($query, $created_at){
        $query->whereDate('created_at', $created_at );
        })
        ->when($request_for, function ($query, $request_for) {
        $query->where('request_for', $request_for);
        })
        ->orderBy('created_at', 'desc')->get();
    }

    public function export($property_uuid, $status=null, $created_at=null, $request_for=null, $limitDisplayTo=null){
      
        $data = [
          'accountpayables' => Property::find($property_uuid)->accountpayables
          ];

          $pdf = \PDF::loadView('properties.accountpayables.export', $data);

        $pdf->output();

          $canvas = $pdf->getDomPDF()->getCanvas();

          $height = $canvas->get_height();
          $width = $canvas->get_width();

          $canvas->set_opacity(.2,"Multiply");

          $canvas->set_opacity(.2);

          $canvas->page_text($width/5, $height/2, Session::get('property'), null, 55, array(0,0,0),2,2,-30);

          return $pdf->download(Session::get('property').'-'.Carbon::now()->format('M d, Y').'accountpayables.pdf');
        
    }

    public function get_statuses(Property $property)
    {       
        return AccountPayable::where('property_uuid', $property->uuid)
        ->groupBy('status')
        ->get();
    }
    
    public function get_dates(Property $property){
        return  AccountPayable::where('property_uuid', $property->uuid)
        ->select('created_at')
        ->groupBy('created_at')
        ->get();
    }

    public function get_types(Property $property){
        return  AccountPayable::where('property_uuid', $property->uuid)
        ->select('request_for')
        ->groupBy('request_for')
        ->get();
    }

    public function show(Property $property, AccountPayable $accountPayable){
        return view('properties.accountpayables.show',[
            'accountpayable' => $accountPayable,
            'particulars' => AccountPayableParticular::where('batch_no', $accountPayable->batch_no)->get()
        ]);
    }
}
