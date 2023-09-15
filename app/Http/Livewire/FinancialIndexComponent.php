<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;

class FinancialIndexComponent extends Component
{
    public $property;
    
    public $filter='daily';

    public function render()
    {
        if($this->filter == 'monthly')
        {
            $collections = app('App\Http\Controllers\PropertyFinancialController')->getCollections('DATE_FORMAT(created_at, "%b-%Y") as date');

            $accountpayables = app('App\Http\Controllers\PropertyFinancialController')->getExpenses('DATE_FORMAT(created_at, "%b-%Y") as date');

        }elseif($this->filter == 'yearly'){
            $collections = app('App\Http\Controllers\PropertyFinancialController')->getCollections('DATE_FORMAT(created_at, "%Y") as date');

            $accountpayables = app('App\Http\Controllers\PropertyFinancialController')->getExpenses('DATE_FORMAT(created_at, "%Y") as date');
        }else
        {
            $collections = app('App\Http\Controllers\PropertyFinancialController')->getCollections('DATE_FORMAT(created_at, "%d-%b-%Y") as date');

            $accountpayables = app('App\Http\Controllers\PropertyFinancialController')->getExpenses('DATE_FORMAT(created_at, "%d-%b-%Y") as date');
        }
        
        $cashflows = $collections->merge($accountpayables);

        $total_occupancy_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_occupancy_rent($this->property);

        $total_vacancy_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_vacancy_rent($this->property);

        $total_occupied_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_occupied_rent($this->property);

        $potential_gross_rent = $total_occupancy_rent;

        $less_vacancy = $total_vacancy_rent;

        $effective_gross_rent = $total_occupied_rent;

        $collected_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_collected_rent($this->property);

        $billed_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_billed_rent($this->property);

        $actual_revenue_collected = app('App\Http\Controllers\PropertyFinancialController')->get_actual_revenue_collected($this->property);

        $revenues = DB::table('collections')
        ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
        ->join('bills','collections.bill_id', 'bills.id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('collections.property_uuid', $this->property->uuid)
        ->whereYear('collections.created_at', Carbon::now()->format('Y'))
        ->where('collections.is_posted',1)
        ->groupBy('bills.particular_id')
        ->orderBy('amount', 'desc')
        ->get();

        $expenses = DB::table('account_payable_liquidations')
          ->select(DB::raw("SUM(account_payable_liquidation_particulars.total) as expense"), 'account_payable_liquidation_particulars.item as particular')
          ->join('account_payable_liquidation_particulars','account_payable_liquidations.batch_no', 'account_payable_liquidation_particulars.batch_no')
          ->join('account_payables','account_payable_liquidations.batch_no', 'account_payables.batch_no')
          ->where('account_payables.property_uuid', $this->property->uuid)
            ->whereYear('account_payables.created_at', Carbon::now()->format('Y'))
        //   ->whereNotNull('account_payable_liquidations.approved_by')
          ->groupBy('account_payable_liquidation_particulars.item')
          ->orderBy('amount', 'desc')
          ->where('account_payables.status', 'completed')
          ->get();

        // $expenses = DB::table('account_payables')
        // ->join('account_payable_liquidation_particulars','account_payables.batch_no', 'account_payable_liquidation_particulars.batch_no')
        // ->where('property_uuid', $this->property->uuid)
        // ->where('status', 'completed')
        // ->get();

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
