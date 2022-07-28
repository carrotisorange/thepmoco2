<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function is_trial_expired($date)
    {
        if($date <= Carbon::now() && $date!=null){
            return true; 
        }else{ 
            return false; 
        } 
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($name, $temporary_username, $external_id, $email, $mobile_number, $discount_code, $checkout_option, $plan_id)
    {
        session(['temporary_username' => $temporary_username]);

        $user_id = User::insertGetId(
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
                'trial_ends_at' => Carbon::now()->addMonth(),
            ]
        );
        //  if($checkout_option == '1')
        //  {
        //     User::where('id', $user_id)
        //     ->where('checkoutoption_id', $checkout_option)
        //     ->update([
        //             'trial_ends_at' => Carbon::now()->addMonth(6)
        //     ]);
        //  }

         return $user_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
     
       if($user->id === auth()->user()->id || auth()->user()->username === 'landley'){
           return view('users.edit', [
           'user' => $user,
           'roles' => Role::orderBy('role')->where('id','!=','5')->where('id','!=','10')->get(),
           ]);
       }else{
            abort(404);
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attributes = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
        'mobile_number' => ['required', Rule::unique('users', 'mobile_number')->ignore($user->id)],
        'password' => ['nullable'],
        'role_id' => ['nullable', Rule::exists('roles', 'id')],
        'status' => 'nullable',
        'avatar' => 'image',
        ]);

        if(isset($attributes['avatar']))
        {
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
        }

        if(isset($attributes['password']))
        {
           $attributes['password'] = Hash::make($request->password);
           $attributes['email_verified_at'] = Carbon::now();
        }
        $user->update($attributes);

        return redirect('/user/'.$user->username.'/edit')->with('success', 'Profile is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
