<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Validation\Rule;
use App\Models\UserRestriction;
use DB;

class EditPersonnelComponent extends Component
{
    public $property;
    public $personnel;

    //input variable
    public $name;
    public $email;
    public $role_id;
    public $is_approved;
    public $user_restrictions;

    public function mount($personnel){
        $this->name = $personnel->user->name;
        $this->email = $personnel->user->email;
        $this->role_id = $personnel->role_id;
        $this->is_approved = $personnel->is_approved;
        $this->user_restrictions = $this->get_user_restrictions();
    }

    protected function rules()
    {
        return [
            'user_restrictions.*.is_approved' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function get_user_restrictions(){
        return UserRestriction::where('user_id', $this->personnel->user->id)->get();
    }

    public function updateButton(){

        $is_email_exists = User::where('email', $this->email)->count();
        
        $validatedUserData = $this->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->personnel->user_id, 'id')],
        ]);

        User::where('id', $this->personnel->user_id)
        ->update($validatedUserData);

        $validatedUserPropertyData = $this->validate([
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'is_approved' => 'required'
        ]);
    
        UserProperty::where('id', $this->personnel->id)
        ->update($validatedUserPropertyData);

        app('App\Http\Controllers\UserRestrictionController')->store($this->property->uuid, $this->personnel->user->id);

        $this->validate();

        DB::transaction(function () {
            foreach($this->user_restrictions as $unit_restriction) {
                $unit_restriction->save();
            }
        });

        return redirect(url()->previous())->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.edit-personnel-component',[
            'roles' => app('App\Http\Controllers\RoleController')->get_roles($this->property->uuid),
        ]);
    }
}
