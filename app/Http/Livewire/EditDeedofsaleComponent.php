<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditDeedofsaleComponent extends Component
{
    use WithFileUploads;

    public $deedofsale;

    //input variables
    public $price;
    public $turnover_at;
    public $title;
    public $tax_declaration;
    public $deed_of_sales;
    public $contract_to_sell;
    public $certificate_of_membership;
    public $contract;
    public $business_permit;

    public function mount($deedofsale){
        $this->turnover_at = Carbon::parse($deedofsale->turnover_at)->format('Y-m-d');
        $this->price = $deedofsale->price;
    }

    protected function rules()
    {
        return [
            'price' => 'required',
            'turnover_at' => 'nullable',
            'contract' => 'nullable | max:102400',
            'title' => 'nullable | max:102400',
            'tax_declaration' => 'nullable | max:102400',
            'deed_of_sales' => 'nullable | max:102400',
            'contract_to_sell' => 'nullable | max:102400',
            'certificate_of_membership' => 'nullable | max:102400',
            'business_permit' => 'nullable | max:102400',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateDeedofsale(){
        
        sleep(2);
        
        $validated = $this->validate();
  
        if ($this->contract === null) {
            $contract = $this->deedofsale->contract;
        }else{
            $contract = $this->contract->store('contracts');
        }

        if ($this->title === null) {
            $title = $this->deedofsale->title;
        }else{
            $title = $this->title->store('titles');
        }

        if ($this->tax_declaration === null) {
            $tax_declaration = $this->deedofsale->tax_declaration;
        }else{
            $tax_declaration = $this->tax_declaration->store('tax_declarations');
        }

        if ($this->deed_of_sales === null) {
            $deed_of_sales = $this->deedofsale->deed_of_sales;
        }else{
            $deed_of_sales = $this->deed_of_sales->store('deed_of_sales');
        }

        if ($this->contract_to_sell === null) {
            $contract_to_sell = $this->deedofsale->contract_to_sell;
        }else{
            $contract_to_sell = $this->contract_to_sell->store('contract_to_sells');
        }

        if ($this->certificate_of_membership === null) {
            $certificate_of_membership = $this->deedofsale->certificate_of_membership;
        }else{
            $certificate_of_membership = $this->certificate_of_membership->store('certificate_of_memberships');
        }

        if ($this->business_permit === null) {
            $business_permit = $this->deedofsale->business_permit;
        }else{
            $business_permit = $this->business_permit->store('business_permits');
        }

        $validated['contract'] = $contract;
        $validated['title'] = $title;
        $validated['tax_declaration'] = $tax_declaration;
        $validated['deed_of_sales'] = $deed_of_sales;
        $validated['contract_to_sell'] = $contract_to_sell;
        $validated['certificate_of_membership'] = $certificate_of_membership;
        $validated['business_permit'] = $business_permit;

        DeedOfSale::where('uuid', $this->deedofsale->uuid)
        ->update($validated);

        return redirect(url()->previous())->with('success', 'Success!');
    }


    public function render()
    {
        return view('livewire.edit-deedofsale-component');
    }
}
