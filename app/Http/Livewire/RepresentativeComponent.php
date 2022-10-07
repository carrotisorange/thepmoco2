<?php

namespace App\Http\Livewire;
use App\Models\Representative;
use App\Models\Relationship;
use App\Models\Owner;
use Livewire\Component;
use Illuminate\Validation\Rule;
use DB;

class RepresentativeComponent extends Component
{
      public $unit;
      public $tenant;

      public function mount($unit, $owner)
      {
        $this->unit = $unit;
        $this->owner = $owner;
        $this->representatives = $this->get_representatives();
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

      public function get_representatives()
      {
        return Owner::find($this->owner->uuid)->representatives;
      }

      public function removeRepresentative($id)
      {
        Representative::destroy($id);

        $this->representatives = $this->get_representatives();

         return back()->with('success', 'Representative is successfully removed');
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function submitForm()
      {
        sleep(1);

        $validatedData = $this->validate();

       try{

           DB::transaction(function () use ($validatedData){
                  $this->store_representative($validatedData);
            });

        $this->representatives = $this->get_representatives();

        session()->flash('success', 'Representative is successfully created.');

       }catch(\Exception $e)
       {
          session()->flash('error');
       }
        
      }

      public function store_representative($validatedData)
      {
          $validatedData['owner_uuid'] = $this->owner->uuid;

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
