<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditDeedofsaleComponent extends Component
{
    public $deedofsale;

    //input variables
    public $title;
    public $tax_declaration;
    public $deed_of_sales;
    public $contract_to_sell;
    public $certificate_of_membership;
    public $contract;


    public function render()
    {
        return view('livewire.edit-deedofsale-component');
    }
}
