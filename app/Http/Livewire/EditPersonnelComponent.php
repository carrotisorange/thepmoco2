<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Validation\Rule;
use App\Models\Feature;

class EditPersonnelComponent extends Component
{
    public $property;
    public $personnel;

    //input variable
    public $name;
    public $email;
    public $role_id;
    public $is_approved;

    public function mount($personnel){
        $this->name = $personnel->name;
        $this->email = $personnel->email;
        $this->role_id = UserProperty::where('user_id', $this->personnel->id)->pluck('role_id')->first();
        $this->is_approved = UserProperty::where('user_id', $this->personnel->id)->pluck('is_approved')->first();
    }

    protected function rules()
    {
        return [
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'is_approved' => 'required'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatePersonnel(){

        $validatedUserData = $this->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->personnel->id, 'id')],
        ]);

        User::where('id', $this->personnel->id)
        ->update($validatedUserData);

        $validatedUserPropertyData = $this->validate();
    
        UserProperty::where('user_id', $this->personnel->id)
        ->update($validatedUserPropertyData);

        return redirect(url()->previous())->with('success', 'Success!');
    }

    public function render()
    {

        return view('livewire.edit-personnel-component',[
            'roles' => app('App\Http\Controllers\RoleController')->get_roles($this->property->uuid),

        ]);
    }
}
