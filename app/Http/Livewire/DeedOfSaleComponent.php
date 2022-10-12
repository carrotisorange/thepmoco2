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

    public $title;
    public $tax_declaration;
    public $deed_of_sales;
    public $contract_to_sell;
    public $certificate_of_membership;

    protected function rules()
    {
        return [
            'title' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'tax_declaration' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'deed_of_sales' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'contract_to_sell' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'certificate_of_membership' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
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

            $validated_data = $this->validate();

            $this->store_deed_of_sale($validated_data);

            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 5, 7);


            // if(Session::get('owner_uuid')){
            //     return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/'.Str::random(8).'/create')->with('success','Deed of sale is successfully created.');
            // }else{
                return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/create')->with('success','Deedof sale is successfully created.');
            // }
            
        }catch(\Exception $e)
        {
           ddd($e);
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

        if($this->title)
        {
            $validated_data['title'] = $this->title->store('titles');
        }

        if($this->tax_declaration)
        {
            $validated_data['tax_declaration'] = $this->tax_declaration->store('tax_declarations');
        }
          
        if($this->deed_of_sales)
        {
            $validated_data['deed_of_sales'] = $this->deed_of_sales->store('deed_of_sales');
        }
           
        if($this->contract_to_sell)
        {
            $validated_data['contract_to_sell'] = $this->contract_to_sell->store('contract_to_sells');
        }
        
        if($this->certificate_of_membership)
        {
            $validated_data['certificate_of_membership'] = $this->certificate_of_membership->store('certificate_of_memberships');
        }

        DeedOfSale::create($validated_data)->uuid;
    }

    public function render()
    {
        return view('livewire.deed-of-sale-component');
    }
}
