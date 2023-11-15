<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use DB;
use Session;
use App\Models\{UserRestriction,User,UserProperty};

class EditPersonnelComponent extends Component
{
    public $personnel;

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
        return UserRestriction::where('user_id', $this->personnel->user->id)
        ->where('restriction_id',2)->orderBy('feature_id')->get();
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
        ->where('property_uuid', Session::get('property_uuid'))
        ->update($validatedUserPropertyData);

        $this->validate();

        DB::transaction(function () {
            foreach($this->user_restrictions as $unit_restriction) {
                $unit_restriction->save();
            }
        });

        app('App\Http\Controllers\PropertyController')->storePropertySession(Session::get('property_uuid'));

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        $availableFeatures = UserRestriction::where('user_id',auth()->user()->id)->where('property_uuid', Session::get('property_uuid'))->where('restriction_id', 2)->where('is_approved',1)->groupBy('feature_id')->orderBy('feature_id')->get();

        return view('livewire.edit-personnel-component',[
            'roles' => app('App\Http\Controllers\Utilities\RoleController')->get_roles(Session::get('property_uuid')),
            'availableFeatures' => $availableFeatures
        ]);
    }
}
