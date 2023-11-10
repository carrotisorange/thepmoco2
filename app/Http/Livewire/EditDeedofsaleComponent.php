<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\DeedOfSale;

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

        $this->contract = $deedofsale->contract;
        $this->title = $deedofsale->title;
        $this->tax_declaration = $deedofsale->tax_declaration;
        $this->deed_of_sales = $deedofsale->deed_of_sales;
        $this->contract_to_sell = $deedofsale->contract_to_sell;
        $this->certificate_of_membership = $deedofsale->certificate_of_membership;
        $this->business_permit = $deedofsale->business_permit;
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

        $validated = $this->validate();

        if($this->contract && $this->deedofsale->contract != $this->contract) {
            DeedOfSale::where('uuid', $this->deedofsale->uuid)
            ->update([
                'contract' => $this->contract->store('contracts'),
            ]);
        }

        if($this->title && $this->deedofsale->title != $this->title) {
             DeedOfSale::where('uuid', $this->deedofsale->uuid)
             ->update([
                'title' => $this->title->store('titles'),
             ]);
        }

        if($this->tax_declaration && $this->deedofsale->tax_declaration != $this->tax_declaration) {
              DeedOfSale::where('uuid', $this->deedofsale->uuid)
              ->update([
                'tax_declaration' => $this->tax_declaration->store('tax_declarations'),
              ]);
        }

        if($this->deed_of_sales && $this->deedofsale->deed_of_sales != $this->deed_of_sales) {
             DeedOfSale::where('uuid', $this->deedofsale->uuid)
              ->update([
                'deed_of_sales' => $this->deed_of_sales->store('deed_of_sales'),
              ]);
        }

        if($this->contract_to_sell && $this->deedofsale->contract_to_sell != $this->contract_to_sell) {
            DeedOfSale::where('uuid', $this->deedofsale->uuid)
              ->update([
                'contract_to_sell' => $this->contract_to_sell->store('contract_to_sells'),
              ]);
        }

        if($this->certificate_of_membership && $this->deedofsale->certificate_of_membership != $this->certificate_of_membership) {
            DeedOfSale::where('uuid', $this->deedofsale->uuid)
              ->update([
                'certificate_of_membership' => $this->certificate_of_membership->store('certificate_of_memberships'),
              ]);
        }

        if($this->business_permit && $this->deedofsale->business_permit != $this->business_permit) {
           DeedOfSale::where('uuid', $this->deedofsale->uuid)
              ->update([
                'business_permit' => $this->business_permit->store('business_permits'),
              ]);
        }

        DeedOfSale::where('uuid', $this->deedofsale->uuid)
        ->update([
            'price' => $this->price,
            'turnover_at' => $this->turnover_at
        ]);

        return redirect(url()->previous())->with('success', 'Changes Saved!');

    }

    public function removeAttachment($file){
        $this->$file = null;
    }

    public function render()
    {
        return view('livewire.edit-deedofsale-component');
    }
}
