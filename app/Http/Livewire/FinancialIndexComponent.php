<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Session;
use Carbon\Carbon;
use PDF;
use App\Models\Property;

class FinancialIndexComponent extends Component
{
    public $property;
    
    public $filter='daily';


    public function downloadCashflowReports(){

        sleep(2);

        return redirect('/property/'.$this->property->uuid.'/financial/cashflow/export/'.$this->filter);
    }

    public function downloadFinancialReports(){

        sleep(2);

        return redirect('/property/'.$this->property->uuid.'/financial/financial/export/'.$this->filter);
    }

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

        $total_occupancy = app('App\Http\Controllers\PropertyFinancialController')->get_total_occupancy($this->property);

        $total_occupancy_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_occupancy_rent($this->property);

        $total_vacancy = app('App\Http\Controllers\PropertyFinancialController')->get_total_vacancy($this->property);

        $total_vacancy_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_vacancy_rent($this->property);

        $total_occupied = app('App\Http\Controllers\PropertyFinancialController')->get_total_occupied($this->property);

        $total_occupied_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_occupied_rent($this->property);

        $potential_gross_rent = $total_occupancy_rent;

        $less_vacancy = $total_vacancy_rent;

        $effective_gross_rent = $total_occupied_rent;

        $collected_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_collected_rent($this->property);

        $billed_rent = app('App\Http\Controllers\PropertyFinancialController')->get_total_billed_rent($this->property);

        return view('livewire.financial-index-component',[
              'cashflows' => $cashflows,
              'collections' => $collections,
              'accountpayables' => $accountpayables,
              'potential_gross_rent' => $potential_gross_rent,
              'less_vacancy' => $less_vacancy,
              'effective_gross_rent' => $effective_gross_rent,
              'collected_rent' => $collected_rent, 
              'billed_rent' => $billed_rent

        ]);
    }
}
