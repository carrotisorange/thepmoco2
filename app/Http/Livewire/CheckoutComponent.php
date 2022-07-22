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
use App\Models\DiscountCode;

class CheckoutComponent extends Component
{
    public $plan_id = 1;
    public $name;
    public $email;
    public $mobile_number;
    public $checkout_option = 1;
    public $discount_code = 'none';

    public function mount($plan_id, $checkout_option, $discount_code)
    {
        $this->plan_id = $plan_id;
        $this->checkout_option = $checkout_option;
        $this->discount_code = $discount_code;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'unique:users'],
            'discount_code' => ['required']
        ];
    }


    public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
    }

    public function generate_external_id($plan_id)
    {
         return Plan::find($plan_id)->plan.'_'.Str::random(8);
    }

    public function generate_temporary_username()
    {
        return Str::random(12);
    }

    public function processPayment()
    {
        sleep(1);

        $validatedData = $this->validate();

        $external_id = $this->generate_external_id($this->plan_id);

        $temporary_username = $this->generate_temporary_username();
        
        app('App\Http\Controllers\UserController')->store($this->name, $temporary_username, $external_id,$this->email, $this->mobile_number, $this->discount_code, $this->checkout_option, $this->plan_id);

        try{
            DB::beginTransaction();

            if($this->checkout_option == '1')
            {
                $last_created_invoice_url = app('App\Http\Controllers\CheckoutController')->charge_user_account(
                    $temporary_username, 
                    $this->discount_code,
                    $external_id,
                    Plan::find($this->plan_id)->description,
                    $this->email, 
                    $this->mobile_number, 
                    $this->name, 
                    Plan::find($this->plan_id)->plan,
                    950-DiscountCode::find($this->discount_code)->discount, 
                    6, 
                    $this->checkout_option,
                );
            }else{
                $last_created_invoice_url = app('App\Http\Controllers\CheckoutController')->charge_user_account(
                    $temporary_username, 
                    $this->discount_code, 
                    $external_id,
                    Plan::find($this->plan_id)->description,
                    $this->email, 
                    $this->mobile_number, 
                    $this->name, 
                    Plan::find($this->plan_id)->plan, 
                    Plan::find($this->plan_id)->price-DiscountCode::find($this->discount_code)->discount, 
                    1, 
                    $this->checkout_option,
                );
            }

            DB::commit();

            return redirect($last_created_invoice_url);

            //return redirect('/thankyou', 'Payment is successfully processed.');
        }
        catch(\Exception $e)
        {   
            DB::rollback();
            ddd($e);

            return back()->with('error','Cannot complete your action.');
        }
    }

    // public function send_mail_to_user()
    // {
    //     $details =[
    //      'message' => CheckoutOption::find($this->checkout_option)->policy
    //     ];

    //     Mail::to(auth()->user()->email)->send(new SendThankyouMailToUser($details));
    // }

    public function render()
    {
        return view('livewire.checkout-component',[
            'plans' => Plan::where('id','!=','4')->get(),
            'checkout_options' => CheckoutOption::all(),
            'selected_plan' => Plan::find($this->plan_id),
            'selected_checkout_option' => CheckoutOption::find($this->checkout_option),
            'selected_discount_code' => DiscountCode::find($this->discount_code),
            'discount_codes' => DiscountCode::all(),
        ]);
    }
}
