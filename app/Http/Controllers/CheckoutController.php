<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;


class CheckoutController extends Controller
{
    public function create($plan_id=1)
    {
        return view('checkout.create');
    }
}
