<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use DB;
use App\Models\Unit;
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
    public $is_the_unit_for_rent_to_tenant;

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

            $validatedData = $this->validate();

            $this->store_deed_of_sale($validatedData);

            $this->update_unit();

            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 5, 7);

            // if(Session::get('owner_uuid')){
            //     return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/'.Str::random(8).'/create')->with('success','Deed of sale is successfully created.');
            // }else{
                return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/create')->with('success','Documents are successfully uploaded.');
            // }
            
        }catch(\Exception $e)
        {
            return back()->with('error','Cannot perform your action.');
        }
    }

    public function update_unit()
    {
        Unit::where('unit', $this->unit->uuid)
        ->update([
            'is_the_unit_for_rent_to_tenant' => $this->is_the_unit_for_rent_to_tenant
        ]);
    }

    public function store_deed_of_sale($validatedData)
    {
        $validatedData = $this->validate();
        $validatedData['uuid'] = Str::uuid();
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['owner_uuid'] = $this->owner->uuid;
        $validatedData['status'] = 'active';
        $validatedData['classification'] = 'regular';
        $validatedData['property_uuid'] = Session::get('property');
        

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

        DeedOfSale::create($validatedData)->uuid;
    }

    public function removeTitle()
    {
        $this->title = '';
    }

    public function removeTaxDeclaration()
    {
        $this->tax_declaration = '';
    }

    public function removeDeedOfSale()
    {
        $this->deed_of_sales = '';
    }

    public function removeContractToSell()
    {
        $this->contract_to_sell = '';
    }

    public function removeCertificateOfMembership()
    {
        $this->certificate_of_membership = '';
    }

    public function render()
    {
        return view('livewire.deed-of-sale-component');
    }
}
