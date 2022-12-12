<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\Feature;
use App\Models\User;
use Auth;
use Session;
use App\Models\Role;

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
    public $user_id;
    public $gender;

    public $is_portfolio_create_allowed;
    public $is_portfolio_read_allowed;
    public $is_portfolio_update_allowed;
    public $is_portfolio_delete_allowed;

    public $is_contract_create_allowed;
    public $is_contract_read_allowed;
    public $is_contract_update_allowed;
    public $is_contract_delete_allowed;
    
    public $is_concern_create_allowed;
    public $is_concern_read_allowed;
    public $is_concern_update_allowed;
    public $is_concern_delete_allowed;

    public $is_tenant_portal_create_allowed;
    public $is_tenant_portal_read_allowed;
    public $is_tenant_portal_update_allowed;
    public $is_tenant_portal_delete_allowed;

    public $is_owner_portal_create_allowed;
    public $is_owner_portal_read_allowed;
    public $is_owner_portal_update_allowed;
    public $is_owner_portal_delete_allowed;

    public $is_account_payable_create_allowed;
    public $is_account_payable_read_allowed;
    public $is_account_payable_update_allowed;
    public $is_account_payable_delete_allowed;

    public $is_account_receivable_create_allowed;
    public $is_account_receivable_read_allowed;
    public $is_account_receivable_update_allowed;
    public $is_account_receivable_delete_allowed;

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

        $this->is_portfolio_create_allowed = $user->is_portfolio_create_allowed;
        $this->is_portfolio_read_allowed = $user->is_portfolio_read_allowed;
        $this->is_portfolio_update_allowed = $user->is_portfolio_update_allowed;
        $this->is_portfolio_delete_allowed = $user->is_portfolio_delete_allowed;

        $this->is_contract_create_allowed = $user->is_contract_create_allowed;
        $this->is_contract_read_allowed = $user->is_contract_read_allowed;
        $this->is_contract_update_allowed = $user->is_contract_update_allowed;
        $this->is_contract_delete_allowed = $user->is_contract_delete_allowed;

        $this->is_concern_create_allowed = $user->is_concern_create_allowed;
        $this->is_concern_read_allowed = $user->is_concern_read_allowed;
        $this->is_concern_update_allowed = $user->is_concern_update_allowed;
        $this->is_concern_delete_allowed = $user->is_concern_delete_allowed;

        $this->is_tenant_portal_create_allowed = $user->is_tenant_portal_create_allowed;
        $this->is_tenant_portal_read_allowed = $user->is_tenant_portal_read_allowed;
        $this->is_tenant_portal_update_allowed = $user->is_tenant_portal_update_allowed;
        $this->is_tenant_portal_delete_allowed = $user->is_tenant_portal_delete_allowed;

        $this->is_owner_portal_create_allowed = $user->is_owner_portal_create_allowed;
        $this->is_owner_portal_read_allowed = $user->is_owner_portal_read_allowed;
        $this->is_owner_portal_update_allowed = $user->is_owner_portal_update_allowed;
        $this->is_owner_portal_delete_allowed = $user->is_owner_portal_delete_allowed;

        $this->is_account_payable_create_allowed = $user->is_account_payable_create_allowed;
        $this->is_account_payable_read_allowed = $user->is_account_payable_read_allowed;
        $this->is_account_payable_update_allowed = $user->is_account_payable_update_allowed;
        $this->is_account_payable_delete_allowed = $user->is_account_payable_delete_allowed;

        $this->is_account_receivable_create_allowed = $user->is_account_receivable_create_allowed;
        $this->is_account_receivable_read_allowed = $user->is_account_receivable_read_allowed;
        $this->is_account_receivable_update_allowed = $user->is_account_receivable_update_allowed;
        $this->is_account_receivable_delete_allowed = $user->is_account_receivable_delete_allowed;  
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

                'is_portfolio_create_allowed' => 'nullable',
                'is_portfolio_read_allowed' => 'nullable',
                'is_portfolio_update_allowed' => 'nullable',
                'is_portfolio_delete_allowed' => 'nullable',

                'is_contract_create_allowed' => 'nullable',
                'is_contract_read_allowed' => 'nullable',
                'is_contract_update_allowed' => 'nullable',
                'is_contract_delete_allowed' => 'nullable',

                'is_concern_create_allowed' => 'nullable',
                'is_concern_read_allowed' => 'nullable',
                'is_concern_update_allowed' => 'nullable',
                'is_concern_delete_allowed' => 'nullable',

                'is_tenant_portal_create_allowed' => 'nullable',
                'is_tenant_portal_read_allowed' => 'nullable',
                'is_tenant_portal_update_allowed' => 'nullable',
                'is_tenant_portal_delete_allowed' => 'nullable',

                'is_owner_portal_create_allowed' => 'nullable',
                'is_owner_portal_read_allowed' => 'nullable',
                'is_owner_portal_update_allowed' => 'nullable',
                'is_owner_portal_delete_allowed' => 'nullable',

                'is_account_payable_create_allowed' => 'nullable',
                'is_account_payable_read_allowed' => 'nullable',
                'is_account_payable_update_allowed' => 'nullable',
                'is_account_payable_delete_allowed' => 'nullable',

                'is_account_receivable_create_allowed' => 'nullable',
                'is_account_receivable_read_allowed' => 'nullable',
                'is_account_receivable_update_allowed' => 'nullable',
                'is_account_receivable_delete_allowed' => 'nullable',
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
            if($this->password)
            {
                $validatedData['password'] = Hash::make($this->password);
            }
            
            DB::transaction(function () use ($validatedData){
                $this->user->update($validatedData);
            });

            session()->flash('success', 'User details is successfully updated.');    
            
        }catch(\Exception $e){
            session()->flash('error');
        }
    }
    public function render()
    {
        return view('livewire.user-edit-component',[
            'features' => Feature::all(),
            'properties' => User::find($this->user->id)->user_properties()->get(),
            'all_properties' => User::find(auth()->user()->id)->user_properties()->get(),
            'roles' => app('App\Http\Controllers\UserPropertyController')->get_personnel_positions(),
        ]);
    }
}
