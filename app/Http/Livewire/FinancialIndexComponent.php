<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Collection;
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


// SELECT
// collections.bill_id AS Collection_ID,
// bills.id AS Bills_ID,
// particulars.particular,
// sum(collections.collection) AS Collections
// FROM collections join bills join particulars
// ON collections.bill_id = bills.id AND bills.particular_id = particulars.id
// WHERE collections.property_uuid = 'c0a3db6c-6c2e-47c2-8142-c6ffc9567c92'
// AND collections.updated_at >= '2022-01-01' AND collections.updated_at <= '2023-01-01' GROUP BY particulars.id;

        //financial reports
        // $revenues = Collection::where('property_uuid', $this->property->uuid)->get();

        $revenues = DB::table('collections')
        ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
        ->join('bills','collections.bill_id', 'bills.id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('collections.property_uuid', $this->property->uuid)
        ->whereYear('collections.updated_at', Carbon::now()->format('Y'))
        ->groupBy('bills.particular_id')
        ->orderBy('amount', 'desc')
        ->get();

        // $expenses = DB::table('liquidations')
        //   ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
        //   ->join('bills','collections.bill_id', 'bills.id')
        //   ->join('particulars', 'bills.particular_id', 'particulars.id')
        //   ->where('collections.property_uuid', $this->property->uuid)
        //   ->whereYear('collections.updated_at', Carbon::now()->format('Y'))
        //   ->groupBy('bills.particular_id')
        //   ->get();

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
              'revenues' => $revenues

        ]);
    }
}
