<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Subscription;
use Xendit\Xendit;
use Carbon\Carbon;
use DB;

class SubscriptionController extends Controller
{
     public function index(User $user, $external_id=null)
     {
        Subscription::where('external_id', $external_id)
        ->update([
            'status' => 'active'
        ]);

        return view('subscriptions.index',[
            'subscriptions'=> Subscription::where('user_id', auth()->user()->id)
            ->when($external_id, function ($query) use ($external_id) {
            $query->where('external_id', $external_id);
            })
            ->get()
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

            ddd($e);

            return back()->with('error', 'Cannot complete your action.');
        }
    }

}


