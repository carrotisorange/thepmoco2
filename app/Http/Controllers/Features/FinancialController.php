<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\Property;
use DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Str;

class FinancialController extends Controller
{
    public function index($property_uuid){

        $featureId = 14; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property_uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

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

        return view('features.financials.index',[
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

    public function export(Property $property, $startDate, $endDate){

          $revenues = DB::table('collections')
          ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
          ->join('bills','collections.bill_id', 'bills.id')
          ->join('particulars', 'bills.particular_id', 'particulars.id')
          ->where('collections.property_uuid', Session::get('property_uuid'))
          ->whereBetween('collections.created_at', [$startDate,$endDate])
          ->where('collections.is_posted',1)
          ->groupBy('bills.particular_id')
          ->orderBy('amount', 'desc')
          ->get();

          $expenses = DB::table('account_payable_liquidations')
          ->select(DB::raw("SUM(account_payable_liquidation_particulars.total) as expense"),
          'account_payable_liquidation_particulars.item as particular')
          ->join('account_payable_liquidation_particulars','account_payable_liquidations.batch_no',
          'account_payable_liquidation_particulars.batch_no')
          ->join('account_payables','account_payable_liquidations.batch_no', 'account_payables.batch_no')
          ->where('account_payables.property_uuid', Session::get('property_uuid'))
          ->whereBetween('account_payables.created_at', [$startDate,$endDate])
          // ->whereNotNull('account_payable_liquidations.approved_by')
          ->groupBy('account_payable_liquidation_particulars.item')
          ->orderBy('amount', 'desc')
          ->where('account_payables.status', 'completed')
          ->get();

        $data = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'revenues' => $revenues,
            'expenses' => $expenses,
        ];

        $folder_path = 'features.financials.export';

        $perspective = 'portrait';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

        $pdf_name = str_replace(' ', '_', $property->property).'_financials_'.str_replace(' ', '_', $startDate.'_'.$endDate).'.pdf';

        return $pdf->stream($pdf_name);
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
    }

    public function get_total_billed_rent($property_uuid){
        return Property::find($property_uuid)->bills()->posted()->whereYear('created_at', Carbon::now()->year)->sum('bill');
    }

    public function get_actual_revenue_collected($property_uuid){
        return DB::table('collections')
        ->join('bills','collections.bill_id', 'bills.id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('collections.property_uuid', $property_uuid)
        ->whereYear('collections.created_at', Carbon::now()->format('Y'))
        ->where('collections.is_posted',1)
        ->sum('collection');
    }
}
