<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DeedOfSale;

class DeedOfSaleEditComponent extends Component
{
    use WithFileUploads;

    public $deedOfSalesDetails;

    public $title;
    public $tax_declaration;
    public $deed_of_sales;
    public $contract_to_sell;
    public $certificate_of_membership;

    public function mount($deedOfSalesDetails)
    {
        // $this->title = $deedOfSalesDetails->title;
        // $this->tax_declaration = $deedOfSalesDetails->tax_declaration;
        // $this->deed_of_sales = $deedOfSalesDetails->deed_of_sales;
        // $this->contract_to_sell = $deedOfSalesDetails->contract_to_sell;
        // $this->certificate_of_membership = $deedOfSalesDetails->certificate_of_membership;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return [
            'title' => 'nullable | mimes:jpg,bmp,png,pdf,docx| max:10240',
            'tax_declaration' => 'nullable | mimes:jpg,bmp,png,pdf,docx| max:10240',
            'deed_of_sales' => 'nullable | mimes:jpg,bmp,png,pdf,docx| max:10240',
            'contract_to_sell' => 'nullable | mimes:jpg,bmp,png,pdf,docx| max:10240',
            'certificate_of_membership' => 'nullable | mimes:jpg,bmp,png,pdf,docx| max:10240',
        ];
    }

    public function removeAttachment($attachment)
    {
        $this->$attachment = '';
    }


    public function submitForm()
    {


         $validatedData = $this->validate();

        try{

           if($this->title){
                DeedOfSale::where('uuid', $this->deedOfSalesDetails->uuid)
                ->update([
                    'title' => $this->title->store('deed_of_sales'),
                ]);
           }

           if($this->tax_declaration){
                DeedOfSale::where('uuid', $this->deedOfSalesDetails->uuid)
                ->update([
                     'tax_declaration' => $this->tax_declaration->store('deed_of_sales'),
                ]);
           }

            if($this->deed_of_sales){
                DeedOfSale::where('uuid', $this->deedOfSalesDetails->uuid)
                ->update([
                     'deed_of_sales' => $this->deed_of_sales->store('deed_of_sales'),
                ]);
           }

            if($this->contract_to_sell){
                DeedOfSale::where('uuid', $this->deedOfSalesDetails->uuid)
                ->update([
                    'contract_to_sell' => $this->contract_to_sell->store('deed_of_sales'),
                ]);
           }

            if($this->certificate_of_membership){
                DeedOfSale::where('uuid', $this->deedOfSalesDetails->uuid)
                ->update([
                    'certificate_of_membership' => $this->certificate_of_membership->store('deed_of_sales'),
                ]);
           }

          return redirect(url()->previous())->with('success', 'Changes Saved!');

        }catch(\Exception $e)
        {
          return redirect(url()->previous())->with('error', $e);
        }
    }

    public function render()
    {
        return view('livewire.deedofsale-edit-component',[
          'deedOfSale_info' => DeedOfSale::find($this->deedOfSalesDetails->uuid),
        ]);
    }
}
