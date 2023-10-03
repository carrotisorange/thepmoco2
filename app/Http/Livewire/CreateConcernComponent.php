<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ConcernCategory;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Concern;
use Session;

class CreateConcernComponent extends Component
{
    use WithFileUploads;
    
    public $tenant;

    //input variables
    public $subject;
    public $category_id;
    public $unit_uuid;
    public $concern;
    public $image;

    protected function rules()
    {
        return [
            'subject' => 'required',
            'category_id' => ['required', Rule::exists('concern_categories', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'concern' => 'required',
            'image' => 'required |max:102400',
        ];
    }
    
    public function updated($propertyName)
    {
       $this->validateOnly($propertyName);
    }

    public function submitButton(){

        sleep(2);

        $validated = $this->validate();
     
        $validated['tenant_uuid'] = $this->tenant->uuid;
        $validated['reference_no'] = auth()->user()->id.'_'.Str::random(8);
        $validated['property_uuid'] = $this->tenant->property_uuid;
        $validated['email'] = $this->tenant->email;
        $validated['mobile_number'] = $this->tenant->mobile_number;

        // if($this->image)
        // {
          $validated['image'] = $this->image->store('concerns');
        // }

        $concern = Concern::create($validated);
 
       return redirect('/property/'.Session::get('property_uuid').'/concern/'.$concern->id.'/edit')->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.create-concern-component',[
            'categories' => ConcernCategory::all(),
            'units' => Tenant::findOrFail($this->tenant->uuid)->contracts()->get()->unique('unit_uuid')
        ]);
    }
}
