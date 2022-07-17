<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;
use DB;
use Xendit\Xendit;
use Str;

class CheckoutComponent extends Component
{
    public $plan_id = 1;
    public $address;
    public $city;
    public $zip_code;

    private $token = 'xnd_development_s3XST6NK13S4A3gYjgNoaJMvT5X5bSBSAiHJhzne02DxonZ2v18tOjt3VmJ';
    

    public function submitForm()
    {
        sleep(1);

        $validatedData = $this->validate();

        $external_id = Plan::find($this->plan_id)->plan.'_'.auth()->user()->id.'_'.Str::random(8);
        try{
            DB::beginTransaction();

            $this->update_user(auth()->user()->id, $this->plan_id);

            $this->store_subscription(auth()->user()->id, $this->plan_id, $external_id);

            $this->charge_user_account($this->token, auth()->user()->id, $this->plan_id, $external_id);

            DB::commit();

        }
        catch(\Exception $e)
        {   
            DB::rollback();
            ddd($e);

            return back()->with('error','Cannot complete your action.');
        }
    }

    public function charge_user_account($token, $user_id, $plan_id, $external_id)
    {
         Xendit::setApiKey($this->token);

         $params = [
            'external_id' => $external_id,
            'payer_email' => User::find($user_id)->email,
            'description' => Plan::find($plan_id)->plan,
            'amount' => Plan::find($plan_id)->price,
            'interval' => 'MONTH',
            'interval_count' => 1,
         ];

        $createRecurring = \Xendit\Recurring::create($params);
         
    }


    protected function rules()
    {
        return [
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ];
    }

    public function update_user($user_id, $plan_id)
    {
        User::where('id', $user_id)
         ->update([
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'status' => 'active',
            'external_id' => $plan_id,
         ]);
    }

    public function store_subscription($user_id, $plan_id, $external_id)
    {
        Subscription::firstOrCreate([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'status' => 'active',
            'price' => Plan::find($this->plan_id)->price,
            'quantity' => 1,
            'trial_ends_at' => User::find($user_id)->trial_ends_at,
            'external_id' => $external_id
        ]);
    }

    public function render()
    {
        return view('livewire.checkout-component',[
            'plans' => Plan::all(),
            'selected_plan' => Plan::find($this->plan_id)
        ]);
    }
}
