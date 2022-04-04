<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use DB;

use Livewire\Component;

class DeedOfSaleComponent extends Component
{

    use WithFileUploads;

    public $unit;
    public $owner;

    public function mount($unit, $owner)
    {
        $this->unit = $unit;
        $this->owner = $owner;
        $this->turnover_at = Carbon::now()->format('Y-m-d');
    }

    public $price;
    public $classification;
    public $turnover_at;
    public $contract;
    public $status;

    protected function rules()
    {
        return [
            'price' => 'nullable|numeric|gt:0',
            'classification' => 'nullable',
            'turnover_at' => 'required',
            'contract' => 'nullable',
            'status' => 'nullable'
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
        $validatedData['uuid'] = Str::uuid();
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['owner_uuid'] = $this->owner->uuid;
        $validatedData['status'] = 'active';
        $validatedData['classification'] = 'regular';

          if($this->contract)
          {
             $validatedData['contract'] = $this->contract->store('deed_of_sales');
          }

        try{
            DB::beginTransaction();
                DeedOfSale::create($validatedData)->uuid;
            DB::commit();
                return
                redirect('/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/representative/'.Str::random(8).'/create')->with('success','Deed of sale has been created.');
        }catch(\Exception $e)
        {
            ddd($e);
            DB::rollback();
            return redirect()->with('error','Cannot perform your action.');
        }
    }

    public function render()
    {
        return view('livewire.deed-of-sale-component');
    }
}
