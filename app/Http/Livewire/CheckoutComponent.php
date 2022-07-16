<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;

class CheckoutComponent extends Component
{
    public $plan_id = 1;
    public $address;
    public $city;
    public $zip_code;
    

    public function submitForm()
    {
        sleep(1);

        $validatedData = $this->validate();

        $this->update_user(auth()->user()->id);

        $this->store_subscription(auth()->user()->id, $this->plan_id);

        ddd('success');
    }

    protected function rules()
    {
        return [
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ];
    }

    public function update_user($user_id)
    {
        User::where('id', $user_id)
         ->update([
            'address' => $this->address,
            'city' => $this->city,
            'zip_code' => $this->zip_code
         ]);
    }

    public function store_subscription($user_id, $plan_id)
    {
        Subscription::create([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'status' => 'active',
            'price' => Plan::find($this->plan_id)->price,
            'quantity' => 1,
            'trial_ends_at' => User::find($user_id)->trial_ends_at,
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
