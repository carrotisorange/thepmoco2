<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use DB;
use Livewire\Component;

class UserEditComponent extends Component
{
    public $user;

    public $name;
    public $username;
    public $email;
    public $mobile_number;
    public $password;
    public $status;
    public $role_id;

    public function mount($user)
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->mobile_number = $user->mobile_number;
        $this->role_id = $user->role_id;
        $this->status = $user->status;
    }
    
     protected function rules()
    {
        return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->user->id, 'id')],
                'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($this->user->id, 'id')],
                'mobile_number' => ['required', Rule::unique('users', 'mobile_number')->ignore($this->user->id, 'id')],
                'role_id' => ['nullable', Rule::exists('roles', 'id')],
                'status' => 'required',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateUser()
    {
        sleep(1);
       
        $validatedData = $this->validate();
         
        try{     
            DB::transaction(function () use ($validatedData){
                $this->user->update($validatedData);
            });

            session()->flash('success', 'User details is successfully updated.');    
            
        }catch(\Exception $e){
            ddd($e);
            session()->flash('error');
        }
    }
    public function render()
    {
        return view('livewire.user-edit-component');
    }
}
