<?php

namespace App\Http\Livewire;

use App\Mail\SendWelcomeMailToMember;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Session;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Role;

use Livewire\Component;

class TeamComponent extends Component
{
     use WithFileUploads;
     
     public $roles;

     public function mount($roles)
     {
        $this->roles = $roles;
     }

    public $role_id;
    public $name;
    public $username;
    public $email;
    public $mobile_number;
    public $avatar;

     protected function rules()
     {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'unique:users'],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'avatar' => 'nullable|image',
        ];
     }

     public function updated($propertyName)
     {
        $this->validateOnly($propertyName);
     }

     public function submitForm()
     {
        sleep(1);

        $validatedData = $this->validate();

        $validatedData['password'] = Hash::make(Str::random());
        $validatedData['status'] = 'pending';
        $validatedData['email_verified_at'] = now();
        $validatedData['account_owner_id'] = auth()->user()->id;

      if(isset($this->avatar))
      {
           $validatedData['avatar'] = $this->avatar->store('avatars');
      }else{
          $validatedData['avatar'] = 'avatars/avatar.png';
      }

        $user_id = User::create($validatedData)->id;

        UserProperty::create([
            'property_uuid' => Session::get('property'),
            'user_id' => $user_id,
            'isAccountOwner' => false
        ]);

        $role = Role::find($this->role_id)->role;

        $details =[
           'title' => Session::get('property_name'),
           'header' => $this->name,
           'body' => 'You have got an invitation to become a '. $role .' of '.Session::get('property_name').' team',
        ];

        Mail::to($this->email)->send(new SendWelcomeMailToMember($details)); 

        return redirect('/property/'.Session::get('property').'/team/'.Str::random(8).'/create')->with('success', 'Member has been created.');
       
     }

     public function resetForm()
     {
        $this->role_id='';
        $this->name='';
        $this->username='';
        $this->email='';
        $this->mobile_number='';
        $this->avatar='';
     }

     public function render()
     {
        return view('livewire.team-component');
     }
}
