<?php

namespace App\Http\Livewire;
use App\Models\Representative;
use App\Models\Relationship;
use App\Models\Owner;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use DB;
use Session;

class RepresentativeComponent extends Component
{
      use WithFileUploads;
      
      public $tenant;
        
      public function mount($owner)
      {
        $this->owner = $owner;
        $this->representatives = $this->get_representatives();
      }

      public $representative;
      public $relationship_id;
      public $mobile_number;
      public $email;
      public $valid_id;

      protected function rules()
      {
        return [
          'representative' => 'required',
          'email' => ['nullable', 'string', 'email', 'max:255', 'unique:guardians'],
          'mobile_number' => 'required',
          'relationship_id' => ['required', Rule::exists('relationships', 'id')],
          'valid_id' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
        ];
      }

      public function get_representatives()
      {
        return Owner::find($this->owner->uuid)->representatives;
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function submitForm()
      {
        

        $validatedData = $this->validate();

       try{
          DB::transaction(function () use ($validatedData){
            $this->store_representative($validatedData);
          });

          return
          redirect('/property/'.Session::get('property').'/owner/'.$this->owner->uuid)->with('success','Success!');

       }catch(\Exception $e)
       {
          session()->flash('error');
       } 
      }

    public function removeAttachment()
    {
        $this->valid_id = '';
    }

      public function store_representative($validatedData)
      {
          $validatedData['owner_uuid'] = $this->owner->uuid;

          if($this->valid_id)
          {
            $validatedData['valid_id'] = $this->valid_id->store('representatives');
          }

          Representative::create($validatedData);
      }

      public function render()
      {
      return view('livewire.representative-component',[
        'relationships' => Relationship::all(),
        'representatives' => Owner::find($this->owner->uuid)->representatives,
      ]);
      }
}
