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

        return redirect('/property/'.$this->property->uuid.'/financial/export/'.$this->filter);
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

        $total_occupancy = Property::find($this->property->uuid)->units->sum('occupancy');

        $total_occupancy_rent = Property::find($this->property->uuid)->units->sum('rent');

        $total_vacancy = Property::find($this->property->uuid)->units->where('status_id','!=' ,2)->sum('occupancy');

        $total_vacancy_rent = Property::find($this->property->uuid)->units->where('status_id', '!=', 2)->sum('rent');

        $total_occupied = Property::find($this->property->uuid)->units->where('status_id' ,2)->sum('occupancy');

        $total_occupied_rent = Property::find($this->property->uuid)->units->where('status_id', 2)->sum('rent');

        $potential_gross_rent = $total_occupancy * $total_occupancy_rent;

        $less_vacancy = $total_vacancy * $total_vacancy_rent;

        $effective_gross_rent = $total_occupied * $total_occupied_rent;

        return view('livewire.financial-index-component',[
              'cashflows' => $cashflows,
              'collections' => $collections,
              'accountpayables' => $accountpayables,
              'potential_gross_rent' => $potential_gross_rent,
              'less_vacancy' => $less_vacancy,
              'effective_gross_rent' => $effective_gross_rent

        ]);
    }
}
