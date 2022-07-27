<?php

namespace App\Http\Livewire;

use App\Mail\WelcomeMailToMember;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Session;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Role;
use DB;
use Livewire\WithPagination;

use Livewire\Component;

class TeamComponent extends Component
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

    protected $teams;

    public function mount()
    {
      $this->teams = $this->get_teams();
    }

     protected function rules()
     {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'unique:users'],
            'password' => ['required'],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'avatar' => 'nullable|image',
        ];
     }

     public function updated($propertyName)
     {
        $this->validateOnly($propertyName);
     }

     public function submitForm()
     {
        sleep(1);

         $validatedData = $this->validate();

         try{
            DB::beginTransaction();

            $user_id = $this->store_team($validatedData);

            $this->store_user_property($user_id);

            DB::commit();       
            
            $this->send_invite();

            $this->resetForm();

            $this->teams = $this->get_teams();

            return back()->with('success', 'Member is successfully created.');

         }catch(\Exception $e)
         {
            DB::rollback();

            return back()->with('error');
         }
       
     }

     public function store_team($validatedData)
     {
         $validatedData['password'] = Hash::make($this->password);
         $validatedData['status'] = 'active';
         $validatedData['email_verified_at'] = now();
         $validatedData['account_owner_id'] = auth()->user()->id;

         if(isset($this->avatar))
         {
            $validatedData['avatar'] = $this->avatar->store('avatars');
         }else{
            $validatedData['avatar'] = 'avatars/avatar.png';
         }

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

     public function send_invite()
     {
         $details = [
         'email' => $this->email,
         'name' => $this->name,
         'role' => Role::find($this->role_id)->role,
         'username' => $this->username,
         'password'=>$this->password
         ];

      Mail::to($this->email)->send(new WelcomeMailToMember($details));
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
        return view('livewire.team-component',[
         'roles' => Role::orderBy('role')->whereIn('id',['1','2', '3', '9'])->get(),
         'teams' => $this->get_teams(),
        ]);
     }

     public function removeUser($id)
     {   
         sleep(1);

         User::destroy($id);

         UserProperty::where('user_id', $id)->delete();

         $this->teams = $this->get_teams();

         return back()->with('success', 'Member is successfully removed.');
     }

     public function get_teams()
     {
         return $members = UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
         ->select('*', 'users.status as user_status', 'users.id as user_id', 'users.created_at as user_created')
         ->join('users', 'user_properties.user_id', 'users.id')
         ->join('types', 'properties.type_id', 'types.id')
         ->join('roles', 'users.role_id', 'roles.id')
         ->where('user_id','!=' , auth()->user()->id)
         ->where('properties.uuid', Session::get('property'))
         ->orderBy('users.created_at', 'desc')
         ->paginate(5);
     }
}
