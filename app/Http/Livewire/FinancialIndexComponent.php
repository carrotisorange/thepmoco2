<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;
use Session;

class FinancialIndexComponent extends Component
{  
    public $filter='daily';

    public function render()
    {
        if($this->filter == 'monthly')
        {
            $collections = app('App\Http\Controllers\FinancialController')->getCollections('DATE_FORMAT(created_at, "%b-%Y") as date');

            $accountpayables = app('App\Http\Controllers\FinancialController')->getExpenses('DATE_FORMAT(created_at, "%b-%Y") as date');

        }elseif($this->filter == 'yearly'){
            $collections = app('App\Http\Controllers\FinancialController')->getCollections('DATE_FORMAT(created_at, "%Y") as date');

            $accountpayables = app('App\Http\Controllers\FinancialController')->getExpenses('DATE_FORMAT(created_at, "%Y") as date');
        }else
        {
            $collections = app('App\Http\Controllers\FinancialController')->getCollections('DATE_FORMAT(created_at, "%d-%b-%Y") as date');

            $accountpayables = app('App\Http\Controllers\FinancialController')->getExpenses('DATE_FORMAT(created_at, "%d-%b-%Y") as date');
        }
        
        $cashflows = $collections->merge($accountpayables);

        $total_occupancy_rent = app('App\Http\Controllers\FinancialController')->get_total_occupancy_rent(Session::get('property_uuid'));

        $total_vacancy_rent = app('App\Http\Controllers\FinancialController')->get_total_vacancy_rent(Session::get('property_uuid'));

        $total_occupied_rent = app('App\Http\Controllers\FinancialController')->get_total_occupied_rent(Session::get('property_uuid'));

        $potential_gross_rent = $total_occupancy_rent;

        $less_vacancy = $total_vacancy_rent;

        $effective_gross_rent = $total_occupied_rent;

        $collected_rent = app('App\Http\Controllers\FinancialController')->get_total_collected_rent(Session::get('property_uuid'));

        $billed_rent = app('App\Http\Controllers\FinancialController')->get_total_billed_rent(Session::get('property_uuid'));

        $actual_revenue_collected = app('App\Http\Controllers\FinancialController')->get_actual_revenue_collected(Session::get('property_uuid'));

        $revenues = DB::table('collections')
        ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
        ->join('bills','collections.bill_id', 'bills.id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('collections.property_uuid', Session::get('property_uuid'))
        ->whereYear('collections.created_at', Carbon::now()->format('Y'))
        ->where('collections.is_posted',1)
        ->groupBy('bills.particular_id')
        ->orderBy('amount', 'desc')
        ->get();

        $expenses = DB::table('account_payable_liquidations')
          ->select(DB::raw("SUM(account_payable_liquidation_particulars.total) as expense"), 'account_payable_liquidation_particulars.item as particular')
          ->join('account_payable_liquidation_particulars','account_payable_liquidations.batch_no', 'account_payable_liquidation_particulars.batch_no')
          ->join('account_payables','account_payable_liquidations.batch_no', 'account_payables.batch_no')
          ->where('account_payables.property_uuid', Session::get('property_uuid'))
            ->whereYear('account_payables.created_at', Carbon::now()->format('Y'))
        //   ->whereNotNull('account_payable_liquidations.approved_by')
          ->groupBy('account_payable_liquidation_particulars.item')
          ->orderBy('amount', 'desc')
          ->where('account_payables.status', 'completed')
          ->get();

        return view('livewire.financial-index-component',[
              'cashflows' => $cashflows,
              'collections' => $collections,
              'accountpayables' => $accountpayables,
              'potential_gross_rent' => $potential_gross_rent,
              'less_vacancy' => $less_vacancy,
              'effective_gross_rent' => $effective_gross_rent,
              'collected_rent' => $collected_rent, 
              'billed_rent' => $billed_rent,
              'actual_revenue_collected' => $actual_revenue_collected,
              'revenues' => $revenues,
              'expenses' => $expenses

        ]);
    }
}
