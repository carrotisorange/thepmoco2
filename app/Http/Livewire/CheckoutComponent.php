<?php

namespace App\Http\Livewire;

use App\Mail\SendThankyouMailToUser;
use App\Models\CheckoutOption;
use Livewire\Component;
use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;
use DB;
use Xendit\Xendit;
use Str;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    public $plan_id = 1;
    public $address;
    public $city;
    public $zip_code;
    public $checkout_option = 1;
    public $checkout_url;

    public function mount($plan_id, $checkout_option)
    {
        $this->plan_id = $plan_id;
        $this->checkout_option = $this->checkout_option;
    }

    private $token = 'xnd_production_52fkoBURt8c7bakQQ0yrlTBIvj4EO6pivzssLgQPK5kDVOziWettxaILUGVj34';

    public function payNow()
    {
        sleep(1);

        $validatedData = $this->validate();

        $external_id = Plan::find($this->plan_id)->plan.'_'.auth()->user()->id.'_'.Str::random(8);
        try{
            DB::beginTransaction();

            $this->update_user(auth()->user()->id, $this->plan_id);

            $this->store_subscription(auth()->user()->id, $this->plan_id, $external_id);

            $last_created_invoice_url = $this->charge_user_account($this->token, auth()->user()->id, $this->plan_id, $external_id, 6,$this->checkout_option);

            //$this->send_mail_to_user();

            DB::commit();

            return redirect($last_created_invoice_url, 'Payment is successfully processed.');

            //return redirect('/thankyou', 'Payment is successfully processed.');
        }
        catch(\Exception $e)
        {   
            DB::rollback();
            ddd($e);

            return back()->with('error','Cannot complete your action.');
        }
    }

    public function send_mail_to_user()
    {
        $details =[
         'message' => CheckoutOption::find($this->checkout_option)->policy
        ];

        Mail::to(auth()->user()->email)->send(new SendThankyouMailToUser($details));
    }

    public function charge_user_account($token, $user_id, $plan_id, $external_id, $interval, $checkout_option)
    {
         Xendit::setApiKey($this->token);

         if($checkout_option === '1')
         {
            $params = [
            'external_id' => $external_id,
            'payer_email' => User::find($user_id)->email,
            'description' => Plan::find($plan_id)->plan,
            'amount' => Plan::find($plan_id)->price,
            'interval' => 'MONTH',
            'total_recurrence' => 6,
            'interval_count' => 1,
            'currency'=>'PHP',
            'success_redirect_url' => 'https://thepmo.co/thankyou',
            'failure_redirect_url' => 'https://thepmo.co/plan/1/checkout/1'
            ];
         }else{
            $params = [
            'external_id' => $external_id,
            'payer_email' => User::find($user_id)->email,
            'description' => Plan::find($plan_id)->plan,
            'amount' => Plan::find($plan_id)->price,
            'interval' => 'MONTH',
            'total_recurrence' => 1,
            'interval_count' => 1,
            'currency'=>'PHP',
            'success_redirect_url' => 'https://thepmo.co/thankyou',
            'failure_redirect_url' => 'https://thepmo.co/plan/1/checkout/1'
            ];
         }
        
        $createRecurring = \Xendit\Recurring::create($params);

        //ddd($createRecurring);

        return $createRecurring['last_created_invoice_url'];
    }

    protected function rules()
    {
        return [
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'checkout_option' => 'required'
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
            'checkoutoption_id' => $this->checkout_url
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
            'external_id' => $external_id,
        ]);
    }

    public function render()
    {
        return view('livewire.checkout-component',[
            'plans' => Plan::where('id','!=','4')->get(),
            'checkout_options' => CheckoutOption::all(),
            'selected_plan' => Plan::find($this->plan_id),
            'selected_checkout_option' => CheckoutOption::find($this->checkout_option)
        ]);
    }
}
