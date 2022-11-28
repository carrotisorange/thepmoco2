<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ConcernCategory;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Models\Notification;
use Str;
use App\Models\Unit;
use App\Models\Concern;
use Session;

class TenantConcernComponent extends Component
{
    public $tenant;
    
    use WithFileUploads;

    public $user;

    public $subject;
    public $category_id;
    public $unit_uuid;
    public $concern;
    public $image;

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
            'image' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            ];
    }

    public function submitForm()
    {
        sleep(1);

        $validatedData = $this->validate();

        $concern_id = $this->store_concern($validatedData);

       $this->store_notification();

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid)->with('success','Concern is reported successfully.');
    }

    public function store_concern($validatedData)
    {
        $validatedData['tenant_uuid'] = $this->tenant->uuid;
        $validatedData['reference_no'] = auth()->user()->id.'_'.Str::random(8);
        $validatedData['property_uuid'] = Session::get('property');

        if($this->image)
        {
          $validatedData['image'] = $this->image->store('concerns');
        }

        $concern_id = Concern::create($validatedData)->id;

        return $concern_id;
    }

    public function store_notification()
    {
           Notification::create([
           'type' => 'concern',
           'user_id' => auth()->user()->id,
           'details' => 'reported a concern.',
           'status' => 'pending',
           'role_id' => auth()->user()->role_id,
           'property_uuid' => Session::get('property')
           ]);
    }

    public function render()
    {
        return view('livewire.portal-tenant-concern-component',[
            'categories' => ConcernCategory::all(),
            'units' => Tenant::findOrFail($this->tenant->uuid)->contracts
        ]);
    }
}
