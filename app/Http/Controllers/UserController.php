<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMailToMember;
use Carbon\Carbon;
use App\Models\Property;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index(Property $property)
{
        $this->authorize('accountowner');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id, 'opens', 8);

        return view('users.index',[
            'users' => app('App\Http\Controllers\UserPropertyController')->show_property_users($property->uuid,auth()->user()->id),
            'properties' => app('App\Http\Controllers\UserPropertyController')->show_user_properties($property->uuid,auth()->user()->id),
        ]);
}

// public function show_all_users(Property $property)
// {
//     return view('users.all-users', [
//         'users' => app('App\Http\Controllers\UserPropertyController')->show_property_users($property->uuid,auth()->user()->id),
//         'properties' => app('App\Http\Controllers\UserPropertyController')->show_user_properties($property->uuid,auth()->user()->id),
//     ]);
// }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property, $random_str)
    {
        return view('users.create');
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
    public function store($name, $temporary_username, $password, $external_id, $email, $role_id, $mobile_number, $discount_code, $checkout_option, $plan_id)
    {
        session(['temporary_username' => $temporary_username]);

        $user_id = User::insertGetId(
            [
                'name' => $name,
                'mobile_number' => $mobile_number,
                'email' => $email,
                'role_id' => $role_id,
                'username' => $temporary_username,
                'password' => Hash::make($password),
                'external_id' => $external_id,
                'checkoutoption_id' => $checkout_option,
                'plan_id' => $plan_id,
                'discount_code' => $discount_code,
                'trial_ends_at' => Carbon::now()->addMonth(),
                'created_at' => Carbon::now(),
                'email_verified_at' => Carbon::now()
            ]
        );

        if($role_id == '5')
        {
            User::where('id', $user_id)
            ->update([
                'password' => null,
                'account_owner_id' => $user_id,
            ]);
        }else{
            $this->send_email($role_id, $email, $temporary_username, $password);
        }

        return $user_id;
    }

    public function generate_temporary_username()
    {
        return Str::random(12);
    }
    
    public function update_tenant_uuid($user_id, $tenant_uuid)
    {
        User::where('id', $user_id)
         ->update([
         'tenant_uuid' => $tenant_uuid
        ]);
    }

    public function send_email($role_id, $email, $username, $password)
    {
        $details = [
        'email' => $email,
        // 'name' => $this->name,
        'role' => Role::find($role_id)->role,
        'username' => $username,
        'password'=>$password
    ];

        Mail::to($email)->send(new WelcomeMailToMember($details));
    }

    public function delegate(Property $property, $user_id, $property_uuid)
    {
        app('App\Http\Controllers\UserPropertyController')->store($property_uuid,$user_id,false,false);

        return back()->with('success', 'User invite is successfully sent.');
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
    
       if($user->id === auth()->user()->id || auth()->user()->role_id === 'manager'){

         //app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens',11);

           return view('users.edit', [
            'user' => $user,
            'roles' => Role::orderBy('role')->where('id','!=','5')->where('id','!=','10')->get(),
           ]);
       }else{
            abort(403);
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
