<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Session;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use DB;
use Livewire\WithPagination;

use Livewire\Component;

class UserComponent extends Component
{
   use WithFileUploads;

   use WithPagination;

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

         $validatedData = $this->validate();

         try{
            DB::beginTransaction();

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
            //$user_id = $this->store_employee($validatedData);

            $this->store_user_property($user_id);

            DB::commit();       

            return redirect('/property/'.Session::get('property').'/user/')->with('success', 'User invite has been sent.');

         }catch(\Exception $e)
         {
            DB::rollback();

            return back()->with('error');
         }
       
     }

     public function store_employee($validatedData)
     {
         $validatedData['password'] = Hash::make($this->password);
         $validatedData['username'] = $this->username;
         $validatedData['account_owner_id'] = auth()->user()->id;
         $validatedData['account_owner_id'] = auth()->user()->checkoutoption_id;
         $validatedData['account_owner_id'] = auth()->user()->plan_id;
         $validatedData['avatar'] = 'avatars/avatar.png';

         $user_id = User::create($validatedData)->id;

         return $user_id;
     }

     public function store_user_property($user_id)
     {
         UserProperty::create([
         'property_uuid' => Session::get('property'),
         'user_id' => $user_id,
         'is_account_owner' => false
         ]);
     }


     public function resetForm()
     {
       $this->role_id='';
       $this->isActive='';
       $this->name='';
       $this->username='';
       $this->email='';
       $this->mobile_number='';
       $this->avatar='';
       $this->password='';
     }

     public function render()
     {
        return view('livewire.user-component',[
         'roles' => Role::orderBy('role')->whereIn('id', ['1', '2', '3', '4', '6', '11', '9'])->get(),
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
