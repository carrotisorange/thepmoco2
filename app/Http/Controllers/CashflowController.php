<?php

namespace App\Http\Controllers;

use Session;
use DB;

class CashflowController extends Controller
{
    public function index(){

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

        //$cashflows = $collections->merge($accountpayables);
    //   ->groupBy('date')
    //   ->orderBy('created_at', 'desc')
    //   ->get();

        return view('cashflows.index',[
            // 'cashflows' => $cashflows,
            'collections' => $collections,
            'accountpayables' => $accountpayables
        ]);
    }
}
