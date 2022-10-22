<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Session;
use App\Models\User;
use App\Models\UserProperty;
use DB;
use Livewire\WithPagination;
use App\Models\Feature;

use Livewire\Component;

class UserComponent extends Component
{
   use WithFileUploads;

   use WithPagination;

   //employee fields
   public $role_id;
   public $name;
   public $username;
   public $email;
   public $mobile_number;
   public $avatar;
   public $password;
   public $sendEmailToEmployee;
   public $createAnotherEmployee;

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

   public function mount()
   {
      $this->sendEmailToEmployee = true;
      $this->createAnotherEmployee = false;

      $this->is_portfolio_create_allowed = false;
      $this->is_portfolio_read_allowed = true;
      $this->is_portfolio_update_allowed = false;
      $this->is_portfolio_delete_allowed = false;

      $this->is_contract_create_allowed = false;
      $this->is_contract_read_allowed = true;
      $this->is_contract_update_allowed = false;
      $this->is_contract_delete_allowed = false;

      $this->is_concern_create_allowed = false;
      $this->is_concern_read_allowed = true;
      $this->is_concern_update_allowed = false;
      $this->is_concern_delete_allowed = false;

      $this->is_tenant_portal_create_allowed = false;
      $this->is_tenant_portal_read_allowed = true;
      $this->is_tenant_portal_update_allowed = false;
      $this->is_tenant_portal_delete_allowed = false;

      $this->is_owner_portal_create_allowed = false;
      $this->is_owner_portal_read_allowed = true;
      $this->is_owner_portal_update_allowed = false;
      $this->is_owner_portal_delete_allowed = false;

      $this->is_account_payable_create_allowed = false;
      $this->is_account_payable_read_allowed = true;
      $this->is_account_payable_update_allowed = false;
      $this->is_account_payable_delete_allowed = false;

      $this->is_account_receivable_create_allowed = false;
      $this->is_account_receivable_read_allowed = true;
      $this->is_account_receivable_update_allowed = false;
      $this->is_account_receivable_delete_allowed = false;
   }

   protected function rules()
   {
      return [
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         'role_id' => ['required', Rule::exists('roles', 'id')],
      ];
   }

   public function updated($propertyName)
   {
      $this->validateOnly($propertyName);
   }

   public function addUser()
   {
      sleep(1);

      $this->validate();

      try{
         DB::transaction(function (){
            //store a new user
            $user_id =  app('App\Http\Controllers\UserController')->store(
            'unnamed', 
            $this->email,
            Str::random(8),
            auth()->user()->id, 
            $this->email, 
            $this->role_id,
            $this->mobile_number, 
            auth()->user()->discount_code,
            auth()->user()->checkout_option,
            auth()->user()->plan_id
         );

            $this->set_user_restrictions($user_id);

            //store a new user and user property
            app('App\Http\Controllers\UserPropertyController')->store(Session::get('property'),$user_id,false,false);
            
         });
         
          if($this->createAnotherEmployee)
          {
          //prompt user withe a sucess page
          return redirect('/property/'.Session::get('property').'/user/'.Str::random(8).'/create')->with('success', 'User invite has been sent.');

          }else{
          //prompt user withe a sucess page
          return redirect('/property/'.Session::get('property').'/user/')->with('success', 'User invite has been sent.');
          }

         }catch(\Exception $e)
         {
            ddd($e);
            //prompt user with an error
            return back()->with('error');
         }
       
     }

     public function render()
     {
        return view('livewire.user-component',[
         'roles' =>  app('App\Http\Controllers\UserPropertyController')->get_employee_positions(), 
         'features' => Feature::all(),
        ]);
     }

     public function set_user_restrictions($user_id)
     {
         User::where('id', $user_id)
         ->update([
            'is_portfolio_create_allowed' => $this->is_portfolio_create_allowed,
            'is_portfolio_read_allowed' => $this->is_portfolio_read_allowed,
            'is_portfolio_update_allowed' => $this->is_portfolio_update_allowed,
            'is_portfolio_delete_allowed' => $this->is_portfolio_delete_allowed,

            'is_contract_create_allowed' => $this->is_contract_create_allowed,
            'is_contract_read_allowed' => $this->is_contract_read_allowed,
            'is_contract_update_allowed' => $this->is_contract_update_allowed,
            'is_contract_delete_allowed' => $this->is_contract_delete_allowed,
         
            'is_concern_create_allowed' => $this->is_concern_create_allowed,
            'is_concern_read_allowed' => $this->is_concern_read_allowed,
            'is_concern_update_allowed' => $this->is_concern_update_allowed,
            'is_concern_delete_allowed' => $this->is_concern_delete_allowed,

            'is_tenant_portal_create_allowed' => $this->is_tenant_portal_create_allowed,
            'is_tenant_portal_read_allowed' => $this->is_tenant_portal_read_allowed,
            'is_tenant_portal_update_allowed' => $this->is_tenant_portal_update_allowed,
            'is_tenant_portal_delete_allowed' => $this->is_tenant_portal_delete_allowed,

            'is_owner_portal_create_allowed' => $this->is_owner_portal_create_allowed,
            'is_owner_portal_read_allowed' => $this->is_owner_portal_read_allowed,
            'is_owner_portal_update_allowed' => $this->is_owner_portal_update_allowed,
            'is_owner_portal_delete_allowed' => $this->is_owner_portal_delete_allowed,

            'is_account_payable_create_allowed' => $this->is_account_payable_create_allowed,
            'is_account_payable_read_allowed' => $this->is_account_payable_read_allowed,
            'is_account_payable_update_allowed' => $this->is_account_payable_update_allowed,
            'is_account_payable_delete_allowed' => $this->is_account_payable_delete_allowed,

            'is_account_receivable_create_allowed' => $this->is_account_receivable_create_allowed,
            'is_account_receivable_read_allowed' => $this->is_account_receivable_read_allowed,
            'is_account_receivable_update_allowed' => $this->is_account_receivable_update_allowed,
            'is_account_receivable_delete_allowed' => $this->is_account_receivable_delete_allowed,
         ]);
     }

     public function removeUser($id)
     {   
         sleep(1);

         User::destroy($id);

         UserProperty::where('user_id', $id)->delete();

         return back()->with('success', 'User is successfully removed.');
     }
}
