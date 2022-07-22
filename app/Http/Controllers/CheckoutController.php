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
use Session;
use DB;

class CheckoutController extends Controller
{
    public function create($plan_id=1,$checkout_option=1, $discount_code='none')
    {
        return view('checkout.create', [
            'plan_id' => $plan_id,
            'checkout_option' => $checkout_option,
            'discount_code' => $discount_code,
           
        ]);
    }

    public function success($name, $temporary_username, $external_id, $email, $mobile_number, $discount_code, $checkout_option, $plan_id)
    {
       try{

        DB::beginTransaction();

        $user_id = $this->store_user($name, $temporary_username, $external_id, $email, $mobile_number, $discount_code, $checkout_option, $plan_id);

        $user_info = User::find($user_id);

        $this->store_subscription($user_info->id, $user_info->plan_id, $user_info->external_id);

        DB::commit();

        if($checkout_option == '1')
        {
           return redirect('/thankyou/');
        }else{
           return redirect('/thankyoutrial');
        }
        
       }catch(\Exception $e)
       {
            DB::rollback();

            return back()->with('Cannot perform your action');
       }
        
    }

    public function thankyou_regular_plan($checkout_option="1")
    {
        return view('checkout.thankyou',[
            'message' => 'Our Free Trial Plan'
        ]);
    }

    public function thankyou_promo_plan($checkout_option="2")
    {
        return view('checkout.thankyou',[
            'message' => 'Our Professional Plan'
        ]);
    }

    public function store_user($name, $temporary_username, $external_id, $email, $mobile_number, $discount_code, $checkout_option, $plan_id)
    {
        
            $user_id = User::insertGetId
                (
                    [
                        'name' => $name,
                        'mobile_number' => $mobile_number,
                        'email' => $email,
                        'role_id' => '5',
                        'username' => $temporary_username,
                        'external_id' => $external_id,
                        'checkoutoption_id' => $checkout_option,
                        'plan_id' => $plan_id,
                        'discount_code' => $discount_code,
                        'trial_ends_at' => Carbon::now()->addMonth(6),
                    ]
            );
        
            if($checkout_option == '1')
            {
                 User::where('id', $user_id)
                 ->where('checkoutoption_id', $checkout_option)
                 ->update([
                    'trial_ends_at' => Carbon::now()->addMonth()
                 ]);
            }
            
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


    public function chooseplanfromlandingpage($plan_id, $checkout_option, $discount_code='none'){

        User::where('id', auth()->user()->id)
         ->update([
            'status' => 'pending'
        ]);

        return redirect('/plan/'.$plan_id.'/checkout/'.$checkout_option.'/get'.$discount_code);
    }

    public function select()
    {
        return view('checkout.select');
    }

    public function charge_user_account($temporary_username, $discount_code, $external_id, $description, $email, $mobile_number, $name, $plan_id, $amount, $total_recurrence, $checkout_option)
    {     
        Xendit::setApiKey('xnd_production_52fkoBURt8c7bakQQ0yrlTBIvj4EO6pivzssLgQPK5kDVOziWettxaILUGVj34');

        $params = [
            'external_id' => $external_id,
            'payer_email' => $email,
            'description' => $description,
            'amount' => $amount,
            'interval' => 'MONTH',
            'total_recurrence' => $total_recurrence,
            //'start_date' => $start_date,
            'interval_count' => 1,
            'currency'=>'PHP',
                // 'success_redirect_url' => 'https://thepmo.co/thankyou',
                // 'failure_redirect_url' => 'https://thepmo.co/select-a-plan',
            'success_redirect_url' => 'https://thepmo.co/success/'.$name.'/'.$temporary_username.'/'.$external_id.'/'.$email.'/'.$mobile_number.'/'.$discount_code.'/'.$checkout_option.'/'.$plan_id,
            'failure_redirect_url' => 'https://thepmo.co//select-a-plan',
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

        return $createRecurring['last_created_invoice_url'];
    }

    public function profile(User $user)
    {  
        if($user->password)
        {
            abort(403);
        }

        return view('checkout.profile',[
            'user' => $user,
        ]);
    }

    public function save(User $user, Request $request){

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

    public function trial_expires_checkout(){
        
    }
}
