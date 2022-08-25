<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;
use App\Models\Subscription;
use DB;
use Session;

class CheckoutController extends Controller
{
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

    public function show_select_plan_page()
    {
        return view('checkout.select-a-plan');
    }

    public function show_select_plan_free_page()
    {
        return view('checkout.select-a-plan-free');
    }

    public function show_checkout_page($plan_id=1,$checkout_option=1, $discount_code='none')
    {
        return view('checkout.create', [
            'plan_id' => $plan_id,
            'checkout_option' => $checkout_option,
            'discount_code' => $discount_code,
        ]);
    }

    public function show_payment_success_page($temporary_username, $amount)
    {
       try{

            DB::beginTransaction();

            $user = User::where('username', $temporary_username)->get();

            $user_id = str_replace( array('[',']') , '' , $user->pluck('id'));

            $user_info = User::find($user_id);

            $this->store_subscription($user_info->id, $user_info->plan_id, $user_info->external_id, $amount);

            DB::commit();

            if($user_info->checkoutoption_id == '1')
            {
                return redirect('/thankyou/');
            }else{
                return redirect('/thankyoutrial/');
            }
        
       }catch(\Exception $e)
       {
            DB::rollback();

            ddd($e);

            return back()->with('Cannot perform your action');
       }    
    }

    public function show_thankyou_regular_plan_page()
    {
        return view('checkout.thankyou',[
            'message' => 'Our Free Trial Plan',
            'temporary_username' => Session::get('temporary_username')
        ]);
    }

    public function show_thankyou_promo_plan_page()
    {
        return view('checkout.thankyou',[
            'message' => 'Our Professional Plan',
            'temporary_username' => Session::get('temporary_username')
        ]);
    }

public function charge_user_account($temporary_username, $external_id, $description, $email, $mobile_number, $name, $amount, $interval)
{
    Xendit::setApiKey(config('services.xendit.xendit_secret_key_dev'));
    
        $params = [
            'external_id' => $external_id,
            'payer_email' => $email,
            'description' => $description,
            'amount' => $amount*$interval,
            // 'amount' => $amount,
            'interval' => 'MONTH',
            //'total_recurrence' => $total_recurrence,
            //'start_date' => $start_date,
            'interval_count' => $interval,
            'currency'=>'PHP',
            // 'success_redirect_url' => '/127.0.0.1:8000/success/'.$temporary_username,
            // 'failure_redirect_url' => '/127.0.0.1:8000/select-a-plan',
            'success_redirect_url' => 'https://thepmo.co/success/'.$temporary_username.'/'.$amount,
            'failure_redirect_url' => 'https://thepmo.co/select-a-plan',
            'customer'=> [
                    'given_name'=> $name,
                    'mobile_number' => $mobile_number,
                    'email' => $email
            ],
            // 'customer_notification_preference'=>[
            //     'invoice_created' => [
            //         'email',
            //         'sms'
            //     ]
            // ]
        ];

        $createRecurring = \Xendit\Recurring::create($params);

        return $createRecurring['last_created_invoice_url'];
    }

    public function show_complete_profile_page(User $user)
    {  
        if($user->password)
        {
            abort(403);
        }

        return view('checkout.profile',[
            'user' => $user,
        ]);
    }

    public function update_user_profile(User $user, Request $request){

        $request->validate([
          //'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255' ,Rule::unique('users','email')->ignore($user->id)],
          'username' => ['required', 'string', 'max:255', Rule::unique('users','username')->ignore($user->id)],
          'mobile_number' => ['required', Rule::unique('users', 'mobile_number')->ignore($user->id)],
          'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        User::where('username', $user->username)
        ->update([
            //'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
             'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
