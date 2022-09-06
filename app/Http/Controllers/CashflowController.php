<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashflowController extends Controller
{
    public function index(){
        return view('cashflows.index');
    }
}
