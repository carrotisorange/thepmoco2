<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Session;

class CashflowIndexComponent extends Component
{
    public $filter = 'daily';

    public function render()
    {
        if($this->filter == 'daily')
        {
             $collections = DB::table('acknowledgement_receipts')
             ->select('id',DB::raw('DATE_FORMAT(created_at, "%d-%b-%Y") as date') ,DB::raw('sum(amount) as amount'),
             DB::raw("'INCOME' as label"))
             ->where('property_uuid', Session::get('property'))
             ->groupBy('date')
             ->orderBy('created_at', 'desc')
             ->get();

             $accountpayables = DB::table('account_payables')
             ->select('id',DB::raw('DATE_FORMAT(created_at, "%d-%b-%Y") as date') ,DB::raw('sum(amount) as amount'),
             DB::raw("'EXPENSE' as label"))
             ->where('property_uuid', Session::get('property'))
             ->where('status', 'approved')
             ->groupBy('date')
             ->orderBy('created_at', 'desc')
             ->get();

        }elseif($this->filter == 'monthly')
        {
            $collections = DB::table('acknowledgement_receipts')
            ->select('id',DB::raw('DATE_FORMAT(created_at, "%b-%Y") as date') ,DB::raw('sum(amount) as amount'),
            DB::raw("'INCOME' as label"))
            ->where('property_uuid', Session::get('property'))
            ->groupBy('date')
            ->orderBy('created_at', 'desc')
            ->get();

            $accountpayables = DB::table('account_payables')
            ->select('id',DB::raw('DATE_FORMAT(created_at, "%b-%Y") as date') ,DB::raw('sum(amount) as amount'),
            DB::raw("'EXPENSE' as label"))
            ->where('property_uuid', Session::get('property'))
            ->where('status', 'approved')
            ->groupBy('date')
            ->orderBy('created_at', 'desc')
            ->get();
        }else{
             $collections = DB::table('acknowledgement_receipts')
             ->select('id',DB::raw('DATE_FORMAT(created_at, "%Y") as date') ,DB::raw('sum(amount) as amount'),
             DB::raw("'INCOME' as label"))
             ->where('property_uuid', Session::get('property'))
             ->groupBy('date')
             ->orderBy('created_at', 'desc')
             ->get();

             $accountpayables = DB::table('account_payables')
             ->select('id',DB::raw('DATE_FORMAT(created_at, "%Y") as date') ,DB::raw('sum(amount) as amount'),
             DB::raw("'EXPENSE' as label"))
             ->where('property_uuid', Session::get('property'))
             ->where('status', 'approved')
             ->groupBy('date')
             ->orderBy('created_at', 'desc')
             ->get();
        }
        

        $cashflows = $collections->merge($accountpayables);

        return view('livewire.cashflow-index-component',[
              'cashflows' => $cashflows,
              'collections' => $collections,
              'accountpayables' => $accountpayables
        ]);
    }
}
