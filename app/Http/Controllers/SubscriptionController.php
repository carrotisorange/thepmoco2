<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use App\Models\{User,Subscription};

class SubscriptionController extends Controller
{
     public function index(User $user, $external_id=null)
     {
        $subscriptions = Subscription::where('user_id', $user->id)->get();

        return view('subscriptions.index',[
            'subscriptions' => $subscriptions
        ]);

     }

   public function store_subscription($user_id, $plan_id, $external_id, $amount)
    {
        try{
            DB::beginTransaction();

            Subscription::create([
                'user_id' => $user_id,
                'plan_id' => $plan_id,
                'external_id' => $external_id,
                'status' => 'pending',
                'price' => $amount,
                'quantity' => 1,
                'trial_ends_at' => Carbon::now()->addMonth(),
            ]);

            DB::commit();

        }catch(\Exception $e)
        {
            DB::rollback();

            return back()->with('error', 'Cannot complete your action.');
        }
    }

}


