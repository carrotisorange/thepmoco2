<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Models\User;


class CheckoutController extends Controller
{
    public function create($plan_id=1,$checkout_option=1)
    {
        return view('checkout.create', [
            'plan_id' => $plan_id,
            'checkout_option' => $checkout_option
        ]);
    }

    public function thankyou()
    {
        return view('checkout.thankyou');
    }

    public function chooseplanfromlandingpage($plan_id, $checkout_option){
        User::where('id', auth()->user()->id)
         ->update([
            'status' => 'pending'
        ]);

        return redirect('/plan/'.$plan_id.'/checkout/'.$checkout_option.'/get');
    }
}
