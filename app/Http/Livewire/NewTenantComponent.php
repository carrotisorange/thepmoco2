<?php

namespace App\Http\Livewire;

use App\Mail\WelcomeMailToNewTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProperty;
use Livewire\WithFileUploads;
use DB;
use Session;

class NewTenantComponent extends Component
{
    use WithFileUploads;

    public $unit;

    public function mount($unit)
    {
        $this->unit = $unit;
    }

    public $tenant;
    public $email;
    public $mobile_number;

    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
            'mobile_number' => ['required', 'max:255', 'unique:tenants'],
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
        $validatedData['uuid'] = Str::uuid();
        $validatedData['photo_id'] = 'avatars/avatar.png';
        $validatedData['property_uuid'] = Session::get('property');
        $tenant = Tenant::create($validatedData)->uuid;

       try{ 

            DB::beginTransaction();

            $user = User::create([
                'email' => $this->email,
                'name' => $this->tenant,
                'username' => Str::random(8),
                'mobile_number' => $this->mobile_number,
                'role_id' => '7',
                'password' => Hash::make($this->mobile_number),
                'avatar' => 'avatars/avatar.png',
                'account_owner_id' => auth()->user()->id,
                'status' => 'pending',
                'email_verified_at' => now(),
            ]);

            UserProperty::create([
                'property_uuid' => Session::get('property'),
                'user_id' => $user->id,
                'is_account_owner' => false
            ]);

            $details =[
                'name' => $this->tenant,
                'email' => $this->email,
                'username' => $user->username
            ];

            Mail::to($this->email)->send(new WelcomeMailToNewTenant($details));

            DB::commit();
            
            return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$tenant.'/guardian/'.Str::random(8).'/create')->with('success','Email has been sent to the tenant.');
       }catch(\Exception $e)
       {
        ddd($e);
        DB::rollback();
        return redirect()->with('error','Cannot perform your action.');
       }
    }

    public function render()
    {
        return view('livewire.new-tenant-component');
    }
}
