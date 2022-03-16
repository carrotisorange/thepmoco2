<?php

namespace App\Http\Livewire;
use App\Models\Contract;
use App\Models\Unit;
use Illuminate\Support\Str;
use DB;
use Livewire\WithFileUploads;

use Livewire\Component;

class ContractComponent extends Component
{
     use WithFileUploads;

      public $unit;
      public $tenant;

      public function mount($unit, $tenant)
      {
      $this->unit = $unit;
      $this->tenant = $tenant;
      }

      public $start;
      public $end;
      public $rent;
      public $discount;
      public $interaction;
      public $contract;

      protected function rules()
      {
      return [
       'start' => 'required|date',
       'end' => 'required|date|after:start',
       'rent' => 'required',
       'discount' => 'required',
       'interaction' => 'required',
       'contract' => 'required|mimes:pdf,doc,docx, image'
      ];
      }

      public function updated($propertyName)
      {
      $this->validateOnly($propertyName);
      }

      public function submitForm()
      {
        sleep(1);

        $contract_uuid = Str::uuid();

        $validatedData = $this->validate();

        try {
            DB::beginTransaction();

            $validatedData['uuid'] = $contract_uuid;
            $validatedData['tenant_uuid'] = $this->tenant->uuid;
            $validatedData['unit_uuid'] = $this->unit->uuid;
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['contract'] = $this->contract->store('contracts');

            Contract::create($validatedData);

            Unit::where('uuid', $this->unit->uuid)->update([
            'status_id' => 4
            ]);

            DB::commit();

            return
            redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$contract_uuid.'/bill/'.Str::random(8).'/create')->with('success','Contract has been created.');

        } catch (\Throwable $e) {
            DB::rollback();
            return back()->with('error','Cannot complete your action.');
        }
      }

      public function resetForm()
      {
      $this->start='';
      $this->end='';
      $this->rent='';
      $this->interaction='';
      $this->discount;
      }

      public function render()
      {
      return view('livewire.contract-component');
      }
}
