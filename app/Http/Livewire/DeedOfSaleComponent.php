<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Unit;

use Livewire\Component;

class DeedOfSaleComponent extends Component
{

    use WithFileUploads;

    public $property;

    public $unit;
    public $owner;

    public $title;
    public $tax_declaration;
    public $deed_of_sales;
    public $contract_to_sell;
    public $certificate_of_membership;
    public $contract;

    protected function rules()
    {
        return [
            'title' => 'nullable | mimes:jpg,png,pdf,docx|max:10240',
            'tax_declaration' => 'nullable | mimes:jpg,png,pdf,docx|max:10240',
            'deed_of_sales' => 'nullable | mimes:jpg,png,pdf,docx|max:10240',
            'contract_to_sell' => 'nullable | mimes:jpg,png,pdf,docx|max:10240',
            'certificate_of_membership' => 'nullable | mimes:jpg,png,pdf,docx|max:10240',
            'contract' => 'nullable | mimes:jpg,png,pdf,docx|max:10240',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        try{

            $validatedData = $this->validate();

            $this->store_deed_of_sale($validatedData);

            app('App\Http\Controllers\PointController')->store($this->property->uuid, auth()->user()->id, 5, 7);

            return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/create')->with('success','Success!');
            
        }catch(\Exception $e)
        {
            return back()->with($e);
        }
    }

    public function store_deed_of_sale($validatedData)
    {
        $validatedData = $this->validate();

        $validatedData['uuid'] = Str::uuid();
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['owner_uuid'] = $this->owner->uuid;
        $validatedData['status'] = 'active';
        $validatedData['classification'] = 'regular';
        $validatedData['property_uuid'] = $this->property->uuid;

        if($this->contract)
        {
            $validatedData['contract'] = $this->contract->store('contracts');
        }

        if($this->title)
        {
            $validatedData['title'] = $this->title->store('titles');
        }

        if($this->tax_declaration)
        {
            $validatedData['tax_declaration'] = $this->tax_declaration->store('tax_declarations');
        }
          
        if($this->deed_of_sales)
        {
            $validatedData['deed_of_sales'] = $this->deed_of_sales->store('deed_of_sales');
        }
           
        if($this->contract_to_sell)
        {
            $validatedData['contract_to_sell'] = $this->contract_to_sell->store('contract_to_sells');
        }
        
        if($this->certificate_of_membership)
        {
            $validatedData['certificate_of_membership'] = $this->certificate_of_membership->store('certificate_of_memberships');
        }

        DeedOfSale::create($validatedData);
    }

    public function removeAttachment($attachment)
    {
        $this->$attachment = '';
    }

    public function render()
    {
        return view('livewire.deedofsale-component');
    }
}
