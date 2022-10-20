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
        $subscriptions = Subscription::where('user_id', $user->id)->where('external_id', $external_id)->pluck('plan_id');

        for ($i=0; $i < $subscriptions->count(); $i++) { 
            if($subscriptions[$i] == '1')
            {
                User::where('id', $user->id)
                ->update([
                    'is_contract_unlocked' => '1'
                ]);
                
            }
            if($subscriptions[$i] == '2')
            {
                User::where('id', $user->id)
                ->update([
                    'is_concern_unlocked' => '1'
                ]);
            }
            if($subscriptions[$i] == '3')
            {
                User::where('id', $user->id)
                ->update([
                    'is_tenantportal_unlocked' => '1'
                ]);
            }
            if($subscriptions[$i] == '4')
            {
                User::where('id', $user->id)
                ->update([
                    'is_ownerportal_unlocked' => '1'
                ]);
            }
            if($subscriptions[$i] == '5')
            {
                User::where('id', $user->id)
                ->update([
                    'is_accountpayable_unlocked' => '1'
                ]);
            }
            if($subscriptions[$i] == '6')
            {
                User::where('id', $user->id)
                ->update([
                    'is_accountreceivable_unlocked' => '1'
                ]);
            }
            if($subscriptions[$i] == '7')
            {
                User::where('id', $user->id)
                ->update([
                    'is_portfolio_unlocked' => '1'
                ]);
            }
        }

        Subscription::where('external_id', $external_id)
        ->update([
            'status' => 'active'
        ]);

        User::where('id', auth()->user()->id)
        ->update([
            'external_id' => $external_id
        ]);

        return view('subscriptions.index',[
            'subscriptions'=> Subscription::where('user_id', $user->id)
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

            return back()->with('error', 'Cannot complete your action.');
        }
    }

}


