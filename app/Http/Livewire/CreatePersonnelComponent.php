<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\SUpport\Str;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;

class CreatePersonnelComponent extends Component
{
    public $property;

    //input variables
    public $role_id;
    public $email;
    public $mobile_number;
    
//    protected function rules()
//    {
//       return [
//          'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')],
//          'role_id' => ['required', Rule::exists('roles', 'id')],
//       ];
//    }

//    public function updated($propertyName)
//    {
//       $this->validateOnly($propertyName);
//    }

   public function storePersonnel(){

    $this->validate([
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')],
        'role_id' => ['required', Rule::exists('roles', 'id')],
    ]);
    
    $username = Role::find($this->role_id)->role.''.UserProperty::where('property_uuid', $this->property->uuid)->count();

    $password = Str::random(8);
    
    $is_user_exists = User::where('email', $this->email)->pluck('id')->first();

        if($is_user_exists){
          $user = User::find($is_user_exists);
        }else{
           $user = User::create(
           [
            'name' => $username,
            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'username' => $this->email,
            'password' => Hash::make($password),
            'external_id' => auth()->user()->external_id,
            'checkoutoption_id' => auth()->user()->checkoutoption_id,
            'plan_id' => auth()->user()->plan_id,
            'discount_code' => auth()->user()->discount_code,
            'trial_ends_at' => Carbon::now()->addMonth(),
            'created_at' => Carbon::now(),
            'email_verified_at' => null
           ]
           );
        }

    UserProperty::create(

        [
               'property_uuid' => $this->property->uuid,
               'user_id' => $user->id,
               'is_account_owner' => false,
               'is_approved' => true,
               'role_id' => $this->role_id
        ]
    );

    if($user->role_id == '5')
        {
            User::where('id', $user->id)
            ->update([
                'password' => null,
                'account_owner_id' => auth()->user()->id,
            ]);

        }else{
            app('App\Http\Controllers\UserController')->send_email($this->role_id, $this->email, $this->email, $password);
    }

        return redirect(url()->previous())->with('success', 'Success!');

   }

    public function isUserExists(){
      DB::table('user_properties')
      ->join('users', 'user_id', 'users.id')
      ->join('properties', 'property_uuid', 'properties.uuid')
      ->where('users.email', $this->email)
      ->count();
     }
    public function render()
    {
        return view('livewire.create-personnel-component',[
            'roles' => app('App\Http\Controllers\RoleController')->get_roles($this->property->uuid),
        ]);
    }
}
