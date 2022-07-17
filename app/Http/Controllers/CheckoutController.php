<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;


class CheckoutController extends Controller
{
    public function create($checkout_url=1)
    {
        return view('checkout.create', [
            'checkout_url' => $checkout_url
        ]);
    }
}
