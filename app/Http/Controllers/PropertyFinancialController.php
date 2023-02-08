<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use DB;
use Carbon\Carbon;
use Session;

class PropertyFinancialController extends Controller
{
    public function index(Property $property){

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',20);

        $collections = DB::table('acknowledgement_receipts')
        ->select('id',DB::raw('DATE_FORMAT(created_at, "%d-%b-%Y") as date') ,DB::raw('sum(amount) as amount'), DB::raw("'INCOME' as label"))
        ->where('property_uuid', Session::get('property'))
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();

        $accountpayables = DB::table('account_payables')
        ->select('id',DB::raw('DATE_FORMAT(created_at, "%d-%b-%Y") as date') ,DB::raw('sum(amount) as amount'), DB::raw("'EXPENSE' as label"))
        ->where('property_uuid', Session::get('property'))
        ->where('status', 'approved')
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();
      
    $cashflows = $collections->merge($accountpayables);

        return view('properties.financials.index',[
            'property' => $property,
            'cashflows' => $cashflows,
            'collections' => $collections,
            'accountpayables' => $accountpayables
        ]);
    }

     public function getCollections($filter){

        return DB::table('acknowledgement_receipts')
        ->select('id',DB::raw($filter) ,DB::raw('sum(amount) as amount'),
        DB::raw("'INCOME' as label"))
        ->where('property_uuid', Session::get('property'))
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function getExpenses($filter){
        return DB::table('account_payables')
        ->select('id',DB::raw($filter) ,DB::raw('sum(amount) as amount'),
        DB::raw("'EXPENSE' as label"))
        ->where('property_uuid', Session::get('property'))
        ->where('status', 'approved')
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function export(Property $property, $filter){

         if($filter == 'monthly')
        {
            $collections = app('App\Http\Controllers\PropertyFinancialController')->getCollections('DATE_FORMAT(created_at, "%b-%Y") as date');

            $accountpayables = app('App\Http\Controllers\PropertyFinancialController')->getExpenses('DATE_FORMAT(created_at, "%b-%Y") as date');

        }elseif($filter == 'yearly'){
            $collections = app('App\Http\Controllers\PropertyFinancialController')->getCollections('DATE_FORMAT(created_at, "%Y") as date');

            $accountpayables = app('App\Http\Controllers\PropertyFinancialController')->getExpenses('DATE_FORMAT(created_at, "%Y") as date');
        }else
        {
            $collections = app('App\Http\Controllers\PropertyFinancialController')->getCollections('DATE_FORMAT(created_at, "%d-%b-%Y") as date');

            $accountpayables = app('App\Http\Controllers\PropertyFinancialController')->getExpenses('DATE_FORMAT(created_at, "%d-%b-%Y") as date');
        }
        
        $cashflows = $collections->merge($accountpayables);

        $data = [
           'accountpayables' => $accountpayables,
           'collections' => $collections,
           'cashflows' => $cashflows
        ];

        $pdf = \PDF::loadView('properties.financials.export', $data);

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, $property->property, null, 55, array(0,0,0),2,2,-30);

        return $pdf->download($property->property.'-'.Carbon::now()->format('M d, Y').'-financial-reports.pdf');
    }
}
