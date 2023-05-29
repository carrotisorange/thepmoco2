<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ConcernCategory;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Concern;

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
            'image' => 'nullable | mimes:jpg,png|max:102400',
            ];
    }
    
    public function updated($propertyName)
    {
       $this->validateOnly($propertyName);
    }

    public function storeConcern(){

        $validated = $this->validate();
     
        $validated['tenant_uuid'] = $this->tenant->uuid;
        $validated['reference_no'] = auth()->user()->id.'_'.Str::random(8);
        $validated['property_uuid'] = $this->tenant->property_uuid;

        if($this->image)
        {
          $validated['image'] = $this->image->store('concerns');
        }

        Concern::create($validated);
 
       return redirect(url()->previous());
    }

    public function render()
    {
        return view('livewire.create-concern-component',[
            'categories' => ConcernCategory::all(),
            'units' => Tenant::findOrFail($this->tenant->uuid)->contracts()->get()->unique('unit_uuid')
        ]);
    }
}
