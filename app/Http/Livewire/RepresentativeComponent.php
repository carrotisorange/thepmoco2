<?php

namespace App\Http\Livewire;
use App\Models\Representative;
use Illuminate\Support\Str;
use App\Models\Relationship;
use Livewire\Component;
use Illuminate\Validation\Rule;

class RepresentativeComponent extends Component
{
      public $unit;
      public $tenant;
      public $representatives;

      public function mount($unit, $owner, $representatives)
      {
      $this->unit = $unit;
      $this->owner = $owner;
      $this->representatives = $representatives;
      }

      public $representative;
      public $relationship_id;
      public $mobile_number;
      public $email;

      protected function rules()
      {
        return [
          'representative' => 'required',
          'email' => ['nullable', 'string', 'email', 'max:255', 'unique:guardians'],
          'mobile_number' => 'required',
          'relationship_id' => ['nullable', Rule::exists('relationships', 'id')],
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

        $validatedData['owner_uuid'] = $this->owner->uuid;
        Representative::create($validatedData);

      $this->resetForm();

        return
        redirect('/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/representative/'.Str::random(8).'/create')->with('success',
        'Representative has been created.');
      }

      public function resetForm()
      {
      $this->representative='';
      $this->email='';
      $this->mobile_number='';
      $this->relationship_id='';
      }

      public function render()
      {
      return view('livewire.representative-component',[
        'relationships' => Relationship::all(),
      ]);
      }
}
