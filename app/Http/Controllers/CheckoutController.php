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
use DB;
use Str;
use App\Models\Plan;
use Session;

class CheckoutController extends Controller
{
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

    public function show_payment_success_page($amount)
    {
       try{

            DB::beginTransaction();

           $user = User::where('username', auth()->user()->username)->pluck('id');

            // $user_id = str_replace( array('[',']') , '' , $user->pluck('id'));

            $user_info = User::find($user[0]);

            $external_id = Plan::find($user->plan_id)->plan.'_'.Str::random(8);

            // $this->app('App\Http\Controllers\SubscriptionController')->store_subscription($user_info->id, $user->plan_id, $external_id, 0);

            DB::commit();

            // if($user_info->checkoutoption_id == '1')
            // {
                return redirect('/thankyou/');
            // }else{
            //     return redirect('/thankyoutrial/');
            // }
        
       }catch(\Exception $e)
       {
            DB::rollback();

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

public function charge_user_account($plan_id, $external_id, $description, $email, $mobile_number, $name, $amount, $interval)
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
            //'success_redirect_url' => '/127.0.0.1:8000/success/'.auth()->user()->username.'/'.$amount,
            'success_redirect_url' => 'https://manuprop.com/user/'.auth()->user()->username.'/subscriptions',
            'failure_redirect_url' => 'https://manuprop.com/select-a-plan-free',
            'customer'=> [
                    'given_name'=> $name,
                    'mobile_number' => $mobile_number,
                    'email' => $email
            ],
            'customer_notification_preference'=>[
                'invoice_created' => [
                    'email',
                    'sms'
                ]
            ]
        ];

        $createRecurring = \Xendit\Recurring::create($params);

        $external_id = Plan::find($plan_id)->plan.'_'.Str::random(8);

        app('App\Http\Controllers\SubscriptionController')->store_subscription(
            auth()->user()->id, $plan_id, $external_id, $amount*$interval
        );

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
    
    public function show_privacy_policy()
    {
        return ;
    }

    public function show_terms_of_service()
    {
        return view('websites.terms-of-service');
    }


}
