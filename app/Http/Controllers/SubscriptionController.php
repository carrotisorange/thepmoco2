<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Subscription;
use Xendit\Xendit;

class SubscriptionController extends Controller
{
     public function index(User $user)
     {
        return view('subscriptions.index',[
            'subscriptions'=> Subscription::where('user_id', $user->id)->get()
        ]);
     }

     public function unsubscribe(User $user, $external_id)
     {
        Xendit::setApiKey(config('services.xendit.xendit_secret_key_dev'));

        $stopRecurring = \Xendit\Recurring::stop($external_id);

        var_dump($stopRecurring);

        return back()->with('succes', 'Subscription is sucessfully stopped.');
     }
}


