<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use App\Models\Bulletin;

class BulletinCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $attachment;

    protected function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'attachment' => 'required | mimes:jpg,png,pdf,docx|max:10240',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){
        $validatedData = $this->validate();

        try{

         $validatedData['attachment'] = $this->attachment->store('bulletins');
         $validatedData['property_uuid'] = Session::get('property_uuid');
         $validatedData['user_id'] = auth()->user()->id;
         $validatedData['is_approved'] = 1;

         Bulletin::create($validatedData);

       }catch(\Exception $e){
         return redirect(url()->previous())->with('error', $e);
       }

        $featureId = 17;

        $restrictionId = 1;

        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'),auth()->user()->id,$restrictionId,$featureId);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function removeAttachment(){
        $this->attachment = null;
    }

    public function render()
    {
        return view('livewire.bulletin-create-component');
    }
}
