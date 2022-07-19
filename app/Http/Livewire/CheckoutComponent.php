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
use Carbon\Carbon;

class CheckoutComponent extends Component
{
    public $plan_id = 1;
    public $name;
    public $email;
    public $mobile_number;
    public $checkout_option = 1;
    public $checkout_url;

    public function mount($plan_id, $checkout_option)
    {
        $this->plan_id = $plan_id;
        $this->checkout_option = $this->checkout_option;
    }

    public function payNow()
    {
        sleep(1);

        $validatedData = $this->validate();

        $external_id = Plan::find($this->plan_id)->plan.'_'.Str::random(8);

        $temporary_username = Str::random(8);

        session(['temporary_username' => $temporary_username]);

        try{
            DB::beginTransaction();

            if($this->checkout_option == '1')
            {
                $last_created_invoice_url = app('App\Http\Controllers\CheckoutController')
                ->charge_user_account(
                    $external_id,$this->email, $this->mobile_number, $this->name, Plan::find($this->plan_id)->plan, 950, 6
                );

            }else{
                $last_created_invoice_url = app('App\Http\Controllers\CheckoutController')
                ->charge_user_account(
                    $external_id,$this->email, $this->mobile_number, $this->name, Plan::find($this->plan_id)->plan, Plan::find($this->plan_id)->price, 1
                );
            }

            $user_id = $this->store_user($temporary_username);

            $this->store_subscription($user_id, $this->plan_id, $external_id);

            // $this->send_mail_to_user();

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

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'unique:users'],
            
        ];
    }

    public function store_user($temporary_username)
    {
        $user_id = User::insertGetId
        ([
           'name' => $this->name,
           'mobile_number' => $this->mobile_number,
           'email' => $this->email,
           'role_id' => '5',
           'username' => $temporary_username,
           'checkoutoption_id' => $this->checkout_option
         ]);

         return $user_id;
    }

    public function store_subscription($user_id, $plan_id, $external_id)
    {
        Subscription::firstOrCreate([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'status' => 'active',
            'price' => '1',
            'quantity' => 1,
            'trial_ends_at' => Carbon::now()->addMonth(),
            'external_id' => $external_id,
        ]);
    }

    public function send_mail_to_user()
    {
        $details =[
         'message' => CheckoutOption::find($this->checkout_option)->policy
        ];

        Mail::to(auth()->user()->email)->send(new SendThankyouMailToUser($details));
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
