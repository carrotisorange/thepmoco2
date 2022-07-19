<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CheckoutController extends Controller
{
    public function create($plan_id=1,$checkout_option=1)
    {

        return view('checkout.create', [
            'plan_id' => $plan_id,
            'checkout_option' => $checkout_option
        ]);
    }

    public function thankyou()
    {
        return view('checkout.thankyou');
    }

    public function chooseplanfromlandingpage($plan_id, $checkout_option){

        User::where('id', auth()->user()->id)
         ->update([
            'status' => 'pending'
        ]);

        return redirect('/plan/'.$plan_id.'/checkout/'.$checkout_option.'/get');
    }

    public function reset()
    {
        User::where('id', auth()->user()->id)
         ->update([
         'status' => 'interested'
         ]);

        return redirect('https://www.thepropertymanager.online/plans-pricing');
    }

    public function select()
    {
        return view('checkout.select');
    }

    public function charge_user_account($external_id, $email, $mobile_number, $name, $description, $amount, $total_recurrence)
    {
        Xendit::setApiKey('xnd_production_52fkoBURt8c7bakQQ0yrlTBIvj4EO6pivzssLgQPK5kDVOziWettxaILUGVj34');

        $params = [
            'external_id' => $external_id,
            'payer_email' => $email,
            'description' => $description,
            'amount' => $amount,
            'interval' => 'MONTH',
            'total_recurrence' => $total_recurrence,
            'interval_count' => 1,
            'currency'=>'PHP',
            'success_redirect_url' => 'https://thepmo.co/thankyou',
            'failure_redirect_url' => 'https://thepmo.co/plan/1/checkout/1',
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
    
        User::where('username', $user->username)
        ->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
