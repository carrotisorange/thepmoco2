<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Session;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Hash;

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
            'mobile_number' => ['required', 'unique:users', 'integer'],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'avatar' => 'image',
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
        $validatedData['avatar'] = $this->avatar->store('avatars');
        $validatedData['status'] = 'pending';

        $user_id = User::create($validatedData)->id;

        UserProperty::create([
            'property_uuid' => Session::get('property'),
            'user_id' => $user_id,
            'isAccountOwner' => false
        ]);

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
