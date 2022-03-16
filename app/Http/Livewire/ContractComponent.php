<?php

namespace App\Http\Livewire;
use App\Models\Contract;
use App\Models\Unit;
use Illuminate\Support\Str;
use DB;

use Livewire\Component;

class ContractComponent extends Component
{
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

      protected function rules()
      {
      return [
       'start' => 'required|date',
       'end' => 'required|date|after:start',
       'rent' => 'required',
       'discount' => 'required',
       'interaction' => 'required'
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

        $validatedData['uuid'] = $contract_uuid;
        $validatedData['tenant_uuid'] = $this->tenant->uuid;
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['user_id'] = auth()->user()->id;

        try {
            DB::beginTransaction();

            $contract_attributes['uuid'] = $contract_uuid;
            $contract_attributes['tenant_uuid'] = $this->tenant->uuid;
            $contract_attributes['unit_uuid'] = $this->unit->uuid;
            $contract_attributes['user_id'] = auth()->user()->id;
            $contract_attributes['status'] = 'pending';

            Contract::create($contract_attributes);

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
