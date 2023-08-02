<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ConcernCategory;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Notification;
use Str;
use App\Models\Unit;
use App\Models\Concern;
use App\Models\UserProperty;
use App\Notifications\NotifyAdminOnConcernReportedByTenant;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Contract;

class PortalTenantConcernComponent extends Component
{
    use WithFileUploads;

    public $user;

    public $subject;
    public $category_id;
    public $unit_uuid;
    public $concern;
    public $image;
    public $availability_time;
    public $availability_date;

    public function mount(){
        $this->availability_date = Carbon::now()->format('Y-m-d');
        $this->availability_time = Carbon::now()->addHour()->timezone('Asia/Manila')->format('H:i');
    }

    public function updated($propertyName)
    {
       $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'subject' => 'required',
            'category_id' => ['required', Rule::exists('concern_categories', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'concern' => 'required',
            'image' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'availability_date' => 'required',
            'availability_time' => 'required'
            ];
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        $concern_id = $this->store_concern($validatedData);

        $this->store_notification();

        return redirect('/'.$this->user->role_id.'/tenant/'. auth()->user()->username.'/concerns/'.$concern_id.'/success')->with('success', 'Success!');
    }

    public function store_concern($validatedData)
    {
        $validatedData['tenant_uuid'] = $this->user->tenant_uuid;
        $validatedData['reference_no'] = auth()->user()->id.'_'.Str::random(8);
        $validatedData['property_uuid'] = Unit::findOrFail($this->unit_uuid)->property_uuid;

        $validatedData['image'] = $this->image->store('concerns');
        

        $concern_id = Concern::create($validatedData)->id;

        return $concern_id;
    }

    public function store_notification()
    {
        $property_uuid = Unit::findOrFail($this->unit_uuid)->property_uuid;

        $user_id = UserProperty::where('property_uuid', $property_uuid)
        ->where('is_approved',1)
        ->whereIn('role_id', [1,9])
        ->pluck('user_id')
        ->first();

        $user = User::find($user_id);

        Notification::send($user, new NotifyAdminOnConcernReportedByTenant($user));
    }

    public function render()
    {
        return view('livewire.portal-tenant-concern-component',[
            'categories' => ConcernCategory::all(),
            'units' => Contract::where('tenant_uuid',$this->user->tenant_uuid)->groupBy('unit_uuid')->distinct('unit_uuid')->get()
        ]);
    }
}
