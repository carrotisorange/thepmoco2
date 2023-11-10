<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Session;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use App\Models\{Feature,Role,User,UserProperty};

class UserCreateComponent extends Component
{
   use WithFileUploads;

   use WithPagination;
   
   //personnel fields
   public $role_id;
   public $name;
   public $username;
   public $email;
   public $mobile_number;
   public $avatar;
   public $password;
   public $sendEmailToPersonnel;
   public $createAnotherPersonnel;

   public function mount()
   {
      $this->sendEmailToPersonnel = true;
      $this->createAnotherPersonnel = false;
   }

   protected function rules()
   {
      return [
         'email' => ['required', 'string', 'email', 'max:255'],
         'role_id' => ['required', Rule::exists('roles', 'id')],
      ];
   }

   public function updated($propertyName)
   {
      $this->validateOnly($propertyName);
   }

   public function storeUser()
   {

      $this->validate();

       if($this->isUserExists()>0){
          return back()->with('error', 'User already exists in the property!');
       }

      try{

         $username = Role::find($this->role_id)->role.''.UserProperty::where('property_uuid',
         Session::get('property_uuid'))->count();

         $password = Str::random(8);

      $user = User::updateOrCreate(
         [
            'email' => $this->email,
         ],

         [
            'name' => $username,
            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'username' => $this->email,
            'password' => Hash::make($password),
            'external_id' => auth()->user()->external_id,
            'checkoutoption_id' => auth()->user()->checkoutoption_id,
            'plan_id' => auth()->user()->plan_id,
            'discount_code' => auth()->user()->discount_code,
            'trial_ends_at' => Carbon::now()->addMonth(),
            'created_at' => Carbon::now(),
            'email_verified_at' => null
         ]
      );

        //store a new user and user property
         UserProperty::updateOrCreate(
            [
               'property_uuid' => Session::get('property_uuid'),
               'user_id' => $user->id,
            ],
            [
               'property_uuid' => Session::get('property_uuid'),
               'user_id' => $user->id,
               'is_account_owner' => false,
               'is_approved' => true,
               'role_id' => $this->role_id
            ]
         );

       }catch(\Exception $e){
          return redirect(url()->previous())->with('error', $e);
       }

      if($user->role_id == '5')
        {
            User::where('id', $user->id)
            ->update([
                'password' => null,
                'account_owner_id' => auth()->user()->id,
            ]);
        }else{
            app('App\Http\Controllers\UserController')->send_email($this->role_id, $this->email, $this->email, $password);
        }

      return redirect('/property/'.Session::get('property_uuid').'/user');

      // if (User::where('email', $this->email)->exists()) {

      //     $user = User::where('email', $this->email);

      //     if(!$this->isUserExists($user)){
      //        UserProperty::firstOrCreate([
      //        'property_uuid' => Session::get('property_uuid'),
      //        'user_id' => $user->get()->toArray()[0]['id'],
      //        ]);
      //     }else{
      //        session()->flash('error', 'Email is already assigned to this property');
      //     }
      // }else{
      //    try{
      //       DB::transaction(function (){
      //          //store a new user
      //          $user_id =  app('App\Http\Controllers\UserController')->store(
      //          'unnamed',
      //          $this->email,
      //          Str::random(8),
      //          auth()->user()->id,
      //          $this->email,
      //          $this->role_id,
      //          $this->mobile_number,
      //          auth()->user()->discount_code,
      //          auth()->user()->checkout_option,
      //          auth()->user()->plan_id
      //    );

      //       $this->set_user_restrictions($user_id);

      //       //store a new user and user property
      //       app('App\Http\Controllers\UserPropertyController')->store(
      //          Session::get('property_uuid'),
      //          $user_id,
      //          false,
      //          true
      //       );

      //    });

      //    }catch(\Exception $e)
      //    {
      //       session()->flash('error', $e);
      //    }
      // }

        if($this->createAnotherPersonnel)
        {
        //prompt user withe a sucess page
        return redirect('/property/'.Session::get('property_uuid').'/user/'.Str::random(8).'/create')->with('success', 'Changes Saved!');

        }else{
        //prompt user withe a sucess page
        return redirect('/property/'.Session::get('property_uuid').'/user/')->with('success', 'Changes Saved!');
        }

     }

     public function isUserExists(){
      DB::table('user_properties')
      ->join('users', 'user_id', 'users.id')
      ->join('properties', 'property_uuid', 'properties.uuid')
      ->where('users.email', $this->email)
      ->count();
     }

     public function render()
     {
        return view('livewire.user-create-component',[
         'roles' =>  app('App\Http\Controllers\RoleController')->get_roles(Session::get('property_uuid')),
         'features' => Feature::all(),
        ]);
     }



     public function removeUser($id)
     {


         User::destroy($id);

         UserProperty::where('user_id', $id)->delete();

         return redirect(url()->previous())->with('success', 'Changes Saved!');
     }
}
