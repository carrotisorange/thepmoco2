<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Subscription;
use Xendit\Xendit;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
     public function index(User $user)
     {
        return view('subscriptions.index',[
            'subscriptions'=> Subscription::where('user_id', auth()->user()->id)->get()
        ]);
     }

   public function store_subscription($user_id, $plan_id, $external_id, $amount)
    {
        Subscription::firstOrCreate([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'external_id' => $external_id,
            'status' => 'active',
            'price' => $amount,
            'quantity' => 1,
            'trial_ends_at' => Carbon::now()->addMonth(), 
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


