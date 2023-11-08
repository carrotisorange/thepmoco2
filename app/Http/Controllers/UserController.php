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
use App\Models\Subscription;
use Session;

class UserController extends Controller
{
    public function export($user_id, $export_option)
    {
        if($export_option == 'portfolio'){

            $portfolio = User::find($user_id)->user_properties()->limit(6)->get();

            $data = [
                'data' => $portfolio,
            ];

            $folder_path = 'features.personnels.exports.portfolio';

            $pdf = app('App\Http\Controllers\ExportController')->generatePDF($folder_path, $data);

            $pdf_name = str_replace(' ', '_', auth()->user()->name).'-properties.pdf';

            return $pdf->stream($pdf_name);

        }elseif($export_option == 'property')
        {
            $property = Property::find(Session::get('property_uuid'));

            $data = [
                'data' => $property,
            ];

            $folder_path = 'features.personnels.exports.property';

            $pdf = app('App\Http\Controllers\ExportController')->generatePDF($folder_path, $data);

            $pdf_name = str_replace(' ', '_', $property->property).'_DCR_'.str_replace(' ', '_', Carbon::now()).'.pdf';

            return $pdf->stream($pdf_name);
        }

    }

    public function isTrialExpired($date)
    {
        if($date <= Carbon::now() && $date!=null){
            return true;
        }else{
            return false;
        }
    }

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
        'role' => Role::find($role_id)->role,
        'username' => $username,
        'password'=>$password
    ];

        Mail::to($email)->send(new WelcomeMailToMember($details));
    }


    public function show(User $user)
    {
        return $user;
    }

    public function unlock(User $user)
    {
        Subscription::where('user_id', auth()->user()->id)->where('status', 'pending')->delete();

        return view('features.personnels.unlock');
    }

    public function edit(User $user)
    {
       if($user->id === auth()->user()->id || auth()->user()->role_id == '5' || auth()->user()->role_id == '9'){

           return view('features.personnels.edit', [
            'user' => $user,
            'roles' => Role::orderBy('role')->where('id','!=','5')->where('id','!=','10')->get(),
           ]);
       }else{
            abort(403);
       }

    }

    public function update(Request $request, User $user)
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'mobile_number' => ['required', Rule::unique('users', 'mobile_number')->ignore($user->id)],
            'role_id' => ['nullable', Rule::exists('roles', 'id')],
            'status' => 'nullable',

        ]);

        if($request->password != null)
        {
           $attributes['password'] = Hash::make($request->password);
           $attributes['email_verified_at'] = Carbon::now();
        }

        $user->update($attributes);

        return redirect('/user/'.$user->username.'/edit')->with('success', 'Changes Saved!');
    }

}
