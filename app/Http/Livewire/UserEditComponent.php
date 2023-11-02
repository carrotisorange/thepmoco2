<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Feature;

class UserEditComponent extends Component
{
    use WithPagination;

    public $user;

    public $name;
    public $username;
    public $email;
    public $mobile_number;
    public $password;
    public $status;
    public $role_id;
    public $user_id;
    public $gender;

    public function mount($user)
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->mobile_number = $user->mobile_number;
        $this->role_id = $user->role_id;
        $this->status = $user->status;
        $this->user_id = $user->id;
        $this->role_id = $user->role_id;
        $this->gender = $user->gender;
    }

    protected function rules()
    {
        return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->user->id, 'id')],
                'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($this->user->id, 'id')],
                'mobile_number' => ['nullable', Rule::unique('users', 'mobile_number')->ignore($this->user->id, 'id')],
                'role_id' => ['nullable', Rule::exists('roles', 'id')],
                'status' => 'nullable',
                'gender' => ['required'],
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateUser()
    {
        $validatedData = $this->validate();

        try{
            if($this->password)
            {
                $validatedData['password'] = Hash::make($this->password);
            }

            DB::transaction(function () use ($validatedData){
                $this->user->update($validatedData);
            });

            return redirect(url()->previous())->with('success', 'Changes Saved!');

        }catch(\Exception $e){
            return redirect(url()->previous())->with('error', $e);
        }
    }
    public function render()
    {
        $featureId = 18;

        $userSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $userSubfeaturesArray = explode(",", $userSubfeatures);

        return view('livewire.user-edit-component',[
            'properties' => User::find($this->user->id)->user_properties()->get(),
            'all_properties' => User::find(auth()->user()->id)->user_properties()->get(),
            'roles' => app('App\Http\Controllers\UserPropertyController')->get_personnel_positions(),
            'sessions' => User::find($this->user->id)->sessions()->orderBy('created_at', 'desc')->get(),
            'userSubfeaturesArray' => $userSubfeaturesArray
        ]);
    }
}
