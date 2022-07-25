<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use DB;
use Session;

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

        try{
            DB::beginTransaction();

            $validated_data = $this->validate();

            $this->store_deed_of_sale($validated_data);

            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 5, 7);

            DB::commit();

            if(Session::forget('owner_uuid')){
                return redirect('/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/'.Str::random(8).'/create')->with('success','Deed of sale is successfully created.');
            }else{
                return
                redirect('/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/enrollee/'.Str::random(8).'/create')->with('success','Deed of sale is successfully created.');
            }
            
        }catch(\Exception $e)
        {
            DB::rollback();
            return back()->with('error','Cannot perform your action.');
        }
    }

    public function store_deed_of_sale($validated_data)
    {
        $validated_data = $this->validate();
        $validated_data['uuid'] = Str::uuid();
        $validated_data['unit_uuid'] = $this->unit->uuid;
        $validated_data['owner_uuid'] = $this->owner->uuid;
        $validated_data['status'] = 'active';
        $validated_data['classification'] = 'regular';
        $validated_data['property_uuid'] = Session::get('property');

        if($this->contract)
        {
            $validated_data['contract'] = $this->contract->store('deed_of_sales');
        }

        DeedOfSale::create($validated_data)->uuid;
    }

    public function render()
    {
        return view('livewire.deed-of-sale-component');
    }
}
