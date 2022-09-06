<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use App\Models\Plan;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect('/select-a-plan');
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'unique:users'],
            //'email_verified_at' => Carbon::now(),
            'password' => ['required', 'confirmed', Rules\Password::defaults()],    
        ]);

        $attributes['password'] = Hash::make($request->password);
        $attributes['checkoutoption_id'] = 4;
        $attributes['plan_id'] = 1;
        $attributes['role_id'] = 5;
        $attributes['trial_ends_at'] = Carbon::now()->addMonth();

        $user = User::create($attributes);

        $external_id = Plan::find(4)->plan.'_'.Str::random(8);

        app('App\Http\Controllers\SubscriptionController')->store_subscription($user->id, 4, $external_id, 0);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
