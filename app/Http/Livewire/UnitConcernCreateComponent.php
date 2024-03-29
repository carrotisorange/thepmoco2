<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Session;
use Str;
use App\Models\{Concern,ConcernCategory};

class UnitConcernCreateComponent extends Component
{
    public $unit;

    public $concern_details;

    use WithFileUploads;

    public $user;

    public $subject;
    public $category_id;
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
            'concern' => 'required',
            'image' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            ];
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        $concern_id = $this->store_concern($validatedData);

    //    $this->store_notification();

        return
        redirect('/property/'.Session::get('property_uuid').'/concern/'.$concern_id.'/edit')->with('success','Changes Saved!');
    }

    public function store_concern($validatedData)
    {
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['reference_no'] = auth()->user()->id.'_'.Str::random(8);
        $validatedData['property_uuid'] = Session::get('property_uuid');

        if($this->image)
        {
          $validatedData['image'] = $this->image->store('concerns');
        }

        $concern_id = Concern::create($validatedData)->id;

        return $concern_id;
    }

    public function store_notification()
    {
        //    Notification::create([
        //    'type' => 'concern',
        //    'user_id' => auth()->user()->id,
        //    'details' => 'reported a concern.',
        //    'status' => 'pending',
        //    'role_id' => auth()->user()->role_id,
        //    'property_uuid' => Session::get('property_uuid')
        //    ]);
    }

    public function render()
    {
        return view('livewire.unit-concern-create-component',[
            'categories' => ConcernCategory::all(),
        ]);
    }
}
