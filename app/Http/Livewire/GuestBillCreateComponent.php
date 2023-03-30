<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guest;

class GuestBillCreateComponent extends Component
{
    public $property;
    public $guest;

    public $view = 'listView';

    public $isPaymentAllowed = true;

    public function render()
    {
        return view('livewire.guest-bill-create-component',[
            'bills' => Guest::find($this->guest->uuid)->bills
        ]);
    }
}
