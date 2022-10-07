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

   public function mount()
   {
      $this->sendEmailToEmployee = true;
   }

   protected function rules()
   {
      return [
         'email' => ['required', 'string', 'email:strict', 'max:255', 'unique:users'],
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
            $this->name, 
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

         //store a new user and user property
         app('App\Http\Controllers\UserPropertyController')->store(Session::get('property'),$user_id,false,false);
            
         });
         
         //prompt user withe a sucess page
         return redirect('/property/'.Session::get('property').'/user/')->with('success', 'User invite has been sent.');

         }catch(\Exception $e)
         {
            //prompt user with an error
            return back()->with('error');
         }
       
     }

     public function render()
     {
        return view('livewire.user-component',[
         'roles' =>  app('App\Http\Controllers\UserPropertyController')->get_employee_positions()
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
