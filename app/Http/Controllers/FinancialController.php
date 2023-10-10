<?php

namespace App\Http\Controllers;

use App\Models\Property;
use DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Str;

class FinancialController extends Controller
{
    public function index($property_uuid){

        $featureId = 14;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property_uuid);


        $collections = DB::table('acknowledgement_receipts')
        ->select('id',DB::raw('DATE_FORMAT(created_at, "%d-%b-%Y") as date') ,DB::raw('sum(amount) as amount'), DB::raw("'INCOME' as label"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();

        $accountpayables = DB::table('account_payables')
        ->select('id',DB::raw('DATE_FORMAT(created_at, "%d-%b-%Y") as date') ,DB::raw('sum(amount) as amount'), DB::raw("'EXPENSE' as label"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->where('status', 'released')
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();

    $cashflows = $collections->merge($accountpayables);

        return view('properties.financials.index',[
            'property' => Session::get('property_uuid'),
            'cashflows' => $cashflows,
            'collections' => $collections,
            'accountpayables' => $accountpayables
        ]);
    }

     public function getCollections($filter){

        return DB::table('acknowledgement_receipts')
        ->select('id',DB::raw($filter) ,DB::raw('sum(amount) as amount'),
        DB::raw("'INCOME' as label"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function getExpenses($filter){
        return DB::table('account_payables')
        ->select('id',DB::raw($filter) ,DB::raw('sum(amount) as amount'),
        DB::raw("'EXPENSE' as label"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->where('status', 'released')
        ->groupBy('date')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function export(Property $property, $type, $filter){
       if($type === 'cashflow'){
            return $this->exportCashflow($property, $type, $filter);
       }else{
            return $this->exportFinancial($property, $type, $filter);
       }


    }


    public function exportFinancial($property, $type, $filter){
         $data = [
              'total_occupancy' =>
              app('App\Http\Controllers\FinancialController')->get_total_occupancy($property),

              'total_occupancy_rent' =>
              app('App\Http\Controllers\FinancialController')->get_total_occupancy_rent($property),

              'total_vacancy' =>
              app('App\Http\Controllers\FinancialController')->get_total_vacancy($property),

              'total_vacancy_rent' =>
              app('App\Http\Controllers\FinancialController')->get_total_vacancy_rent($property),

              'total_occupied' =>
              app('App\Http\Controllers\FinancialController')->get_total_occupied($property),

              'total_occupied_rent' =>
              app('App\Http\Controllers\FinancialController')->get_total_occupied_rent($property),

              'potential_gross_rent' =>
              app('App\Http\Controllers\FinancialController')->get_total_occupancy($property) *
              app('App\Http\Controllers\FinancialController')->get_total_occupancy_rent($property),

              'less_vacancy' =>   app('App\Http\Controllers\FinancialController')->get_total_vacancy($property) *
              app('App\Http\Controllers\FinancialController')->get_total_vacancy_rent($property),

              'effective_gross_rent' =>
              app('App\Http\Controllers\FinancialController')->get_total_occupied($property) *
              app('App\Http\Controllers\FinancialController')->get_total_occupied_rent($property),

              'collected_rent' =>
              app('App\Http\Controllers\FinancialController')->get_total_collected_rent($property),

                'billed_rent' =>
                app('App\Http\Controllers\FinancialController')->get_total_billed_rent($property),

                'actual_revenue_collected' =>
                app('App\Http\Controllers\FinancialController')->get_actual_revenue_collected($property),
          ];

          $pdf = \PDF::loadView('properties.financials.export_financials', $data);

          $pdf->output();

          $canvas = $pdf->getDomPDF()->getCanvas();

          $height = $canvas->get_height();
          $width = $canvas->get_width();

          $canvas->set_opacity(.2,"Multiply");

          $canvas->set_opacity(.2);

              $canvas->page_text($width/5, $height/2, Str::limit($property->property, 15), null, 55, array(0,0,0),2,2,-30);

          return $pdf->stream($property->property.'-'.Carbon::now()->format('M d, Y').'-'.$type.'-reports.pdf');
    }

    public function exportCashflow($property, $type, $filter){
          if($filter == 'monthly')
          {
            $collections =
            app('App\Http\Controllers\FinancialController')->getCollections('DATE_FORMAT(created_at, "%b-%Y") as
            date');

            $accountpayables =
            app('App\Http\Controllers\FinancialController')->getExpenses('DATE_FORMAT(created_at, "%b-%Y") as
            date');

            }elseif($filter == 'yearly'){
            $collections =
            app('App\Http\Controllers\FinancialController')->getCollections('DATE_FORMAT(created_at, "%Y") as
            date');

            $accountpayables =
            app('App\Http\Controllers\FinancialController')->getExpenses('DATE_FORMAT(created_at, "%Y") as date');
            }else
            {
            $collections =
            app('App\Http\Controllers\FinancialController')->getCollections('DATE_FORMAT(created_at, "%d-%b-%Y")
            as date');

            $accountpayables =
            app('App\Http\Controllers\FinancialController')->getExpenses('DATE_FORMAT(created_at, "%d-%b-%Y") as
            date');
          }

          $cashflows = $collections->merge($accountpayables);

          $data = [
          'accountpayables' => $accountpayables,
          'collections' => $collections,
          'cashflows' => $cashflows
          ];

          $pdf = \PDF::loadView('properties.financials.export_cashflows', $data);

          $pdf->output();

          $canvas = $pdf->getDomPDF()->getCanvas();

          $height = $canvas->get_height();
          $width = $canvas->get_width();

          $canvas->set_opacity(.2,"Multiply");

          $canvas->set_opacity(.2);

              $canvas->page_text($width/5, $height/2, Str::limit($property->property, 15), null, 55, array(0,0,0),2,2,-30);

          return $pdf->stream($property->property.'-'.Carbon::now()->format('M d, Y').'-'.$type.'-reports.pdf');
    }

    public function get_total_occupancy($property_uuid){
       return Property::find($property_uuid)->units->sum('occupancy');
    }

    public function get_total_occupancy_rent($property_uuid){
        return Property::find($property_uuid)->units->sum('rent');
    }

    public function get_total_vacancy($property_uuid){
        return Property::find($property_uuid)->units->where('status_id','!=' ,2)->sum('occupancy');
    }

    public function get_total_vacancy_rent($property_uuid){
        return Property::find($property_uuid)->units->where('status_id', '!=', 2)->sum('rent');
    }

    public function get_total_occupied($property_uuid){
        return Property::find($property_uuid)->units->where('status_id' ,2)->sum('occupancy');
    }

    public function get_total_occupied_rent($property_uuid){
        return Property::find($property_uuid)->units->where('status_id', 2)->sum('rent');
    }

    public function get_total_collected_rent($property_uuid){

           return DB::table('collections')
           // ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
           ->join('bills','collections.bill_id', 'bills.id')
           ->join('particulars', 'bills.particular_id', 'particulars.id')
           ->where('collections.property_uuid', $property_uuid)
           ->whereYear('collections.created_at', Carbon::now()->format('Y'))
           ->where('collections.is_posted',1)
                  ->where('bills.particular_id', 1)
           ->sum('collection');


        // find($property_uuid)->bills()->posted()->wherein('status', ['paid', 'partially_paid'])
        // ->whereYear('created_at', Carbon::now()->year)
        // ->sum('initial_payment');
    }

    public function get_total_billed_rent($property_uuid){
        return Property::find($property_uuid)->bills()->posted()->whereYear('created_at', Carbon::now()->year)->sum('bill');
    }

    public function get_actual_revenue_collected($property_uuid){
        return DB::table('collections')
        // ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
        ->join('bills','collections.bill_id', 'bills.id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('collections.property_uuid', $property_uuid)
        ->whereYear('collections.created_at', Carbon::now()->format('Y'))
        ->where('collections.is_posted',1)
        // ->groupBy('bills.particular_id')
        ->sum('collection');
    }
}