<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restriction;
use App\Models\User;
use App\Models\UserRestriction;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendThankyouMailToUser;
use App\Models\Feature;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return redirect('/select-a-plan');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'username' => ['required', 'string', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required'
        ]);

        $attributes['password'] = Hash::make($request->password);
        $attributes['checkoutoption_id'] = 4;
        $attributes['plan_id'] = 1;
        $attributes['user_type'] = 1;

        $attributes['role_id'] = 5;
        $attributes['trial_ends_at'] = Carbon::now()->addMonths(2);
        $attributes['discount_code'] = 'none';
        $attributes['username'] = $request->email;

        $user = User::create($attributes);

        Mail::to($user->email)->send(new SendThankyouMailToUser($user));

      event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
