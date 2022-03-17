<?php

namespace App\Http\Livewire;
use App\Models\Representative;
use Illuminate\Support\Str;

use Livewire\Component;

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
      public $relationship;
      public $mobile_number;
      public $email;

      protected function rules()
      {
      return [
      'representative' => 'required',
      'email' => ['required', 'string', 'email', 'max:255', 'unique:guardians'],
      'mobile_number' => 'required|integer|min:11',
      'relationship' => 'required',
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
      $this->relationship='';
      }

      public function render()
      {
      return view('livewire.representative-component');
      }
}
