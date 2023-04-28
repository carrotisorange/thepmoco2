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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Auth;;
use \PDF;
use App\Models\Subscription;
use Session;

class UserController extends Controller
{

    public function export($user_id, $export_option)
    {
        if($export_option == 'portfolio'){

            $portfolio = User::find(Auth::user()->id)->user_properties()->limit(3)->get();

            $data = $this->get_data($portfolio);

            $pdf = $this->generate_pdf($data, $export_option);

            return $pdf->download(Carbon::now().'-'.auth()->user()->name.'-portfolio.pdf');
        }elseif($export_option == 'property')
        {
            $property = Property::find(Session::get('property'));

            $data = $this->get_data($property);

            $pdf = $this->generate_pdf($data, $export_option);

            return $pdf->download(Carbon::now().'-'.auth()->user()->name.'-property.pdf');
        }

    }

    public function get_data($data)
    {
        return $data = [
            'data' => $data,
        ];
    }
    
    public function generate_pdf($data, $export_option)
    {
        $pdf = PDF::loadView('users.exports.'.$export_option, $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();

        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'The PMO Co.', null, 55, array(0,0,0),2,2,-30);

        return $pdf;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property, $random_str)
    {
        $this->authorize('accountownerandmanager');

        return view('users.create',[
            'property' => $property
        ]);
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
        return Str::random(8);
    }
    
    public function update_user_tenant_uuid($user_id, $tenant_uuid)
    {
        User::where('id', $user_id)
         ->update([
         'tenant_uuid' => $tenant_uuid
        ]);
    }

        
    public function update_user_owner_uuid($user_id, $owner_uuid)
    {
        User::where('id', $user_id)
         ->update([
         'owner_uuid' => $owner_uuid
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

        return back()->with('success', 'Success!');
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

    public function unlock(User $user)
    {
        Subscription::where('user_id', auth()->user()->id)->where('status', 'pending')->delete();

        return view('users.unlock');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
       if($user->id === auth()->user()->id || auth()->user()->role_id == '5' || auth()->user()->role_id == '9'){

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
            'role_id' => ['nullable', Rule::exists('roles', 'id')],
            'status' => 'nullable',
            // 'avatar' => 'image',
        ]);

        // if($request->avatar != null)
        // {
        //     $attributes['avatar'] = request()->file('avatar')->store('avatars');
        // }

        if($request->password != null)
        {
           $attributes['password'] = Hash::make($request->password);
           $attributes['email_verified_at'] = Carbon::now();
        }

        $user->update($attributes);

        return redirect('/user/'.$user->username.'/edit')->with('success', 'Success!');
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
