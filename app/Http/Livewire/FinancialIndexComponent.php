<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;
use Session;
use App\Models\Collection;

class FinancialIndexComponent extends Component
{
    public $filter='daily';

    public $startDate;
    public $endDate;

    public function mount(){
        $this->startDate = Carbon::now()->startOfYear()->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');
    }

    public function export(){
        return redirect('/property/'.Session::get('property_uuid').'/financial/export/'.$this->startDate.'/'.$this->endDate);
    }

    public function render()
    {
        $propertyCollectionsCount = Collection::where('property_uuid', Session::get('property_uuid'))->posted()->count();

        $potential_gross_rent = app('App\Http\Controllers\Features\FinancialController')->get_total_occupancy_rent(Session::get('property_uuid'));

        $less_vacancy = app('App\Http\Controllers\Features\FinancialController')->get_total_vacancy_rent(Session::get('property_uuid'));

        $effective_gross_rent = app('App\Http\Controllers\Features\FinancialController')->get_total_occupied_rent(Session::get('property_uuid'));

        $collected_rent = app('App\Http\Controllers\Features\FinancialController')->get_total_collected_rent(Session::get('property_uuid'));

        $billed_rent = app('App\Http\Controllers\Features\FinancialController')->get_total_billed_rent(Session::get('property_uuid'));

        $actual_revenue_collected = app('App\Http\Controllers\Features\FinancialController')->get_actual_revenue_collected(Session::get('property_uuid'));

        $revenues = DB::table('collections')
        ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
        ->join('bills','collections.bill_id', 'bills.id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('collections.property_uuid', Session::get('property_uuid'))
        ->whereBetween('collections.created_at', [$this->startDate,$this->endDate])
        ->where('collections.is_posted',1)
        ->groupBy('bills.particular_id')
        ->orderBy('amount', 'desc')
        ->get();

        $expenses = DB::table('account_payable_liquidations')
          ->select(DB::raw("SUM(account_payable_liquidation_particulars.total) as expense"), 'account_payable_liquidation_particulars.item as particular')
          ->join('account_payable_liquidation_particulars','account_payable_liquidations.batch_no', 'account_payable_liquidation_particulars.batch_no')
          ->join('account_payables','account_payable_liquidations.batch_no', 'account_payables.batch_no')
          ->where('account_payables.property_uuid', Session::get('property_uuid'))
          ->whereBetween('account_payables.created_at', [$this->startDate,$this->endDate])
          ->groupBy('account_payable_liquidation_particulars.item')
          ->orderBy('amount', 'desc')
          ->where('account_payables.status', 'completed')
          ->get();

        return view('livewire.features.financial.financial-index-component',[
            'revenues' => $revenues,
            'expenses' => $expenses,
            'potential_gross_rent' => $potential_gross_rent,
            'less_vacancy' => $less_vacancy,
            'effective_gross_rent' => $effective_gross_rent,
            'collected_rent' => $collected_rent,
            'billed_rent' => $billed_rent,
            'actual_revenue_collected' => $actual_revenue_collected,
            'propertyCollectionsCount' => $propertyCollectionsCount
        ]);
    }
}
