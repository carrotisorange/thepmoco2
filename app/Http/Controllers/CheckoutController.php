<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Models\User;


class CheckoutController extends Controller
{
    public function create($checkout_url=1)
    {
        return view('checkout.create', [
            'checkout_url' => $checkout_url
        ]);
    }

    public function thankyou()
    {
        return view('checkout.thankyou');
    }

    public function chooseplanfromlandingpage($plan_id){
        User::where('id', auth()->user()->id)
         ->update([
            'status' => 'pending'
        ]);

        return redirect('/select-a-plan/'.$plan_id);
    }
}
