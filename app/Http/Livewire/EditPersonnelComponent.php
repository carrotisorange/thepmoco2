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
    public $status;
    public $is_approved;

    public function mount($personnel){
        $this->name = $personnel->name;
        $this->email = $personnel->email;
        $this->role_id = $personnel->role_id;
        $this->status = $personnel->status;
        $this->is_approved = $personnel->is_approved;
    }

    protected function rules()
    {
        return [
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatePersonnel(){

        $validated = $this->validate();

        User::where('id', $this->personnel->id)
        ->update($validated);

        UserProperty::where('user_id', $this->personnel->id)
        ->update([
            'role_id' => $this->role_id,
            'is_approved' => $this->is_approved
        ]);

         return redirect(url()->previous());
    }

    public function render()
    {
        return view('livewire.edit-personnel-component',[
            'roles' => app('App\Http\Controllers\RoleController')->get_roles($this->property->uuid),
            'features' => Feature::all(),
        ]);
    }
}
