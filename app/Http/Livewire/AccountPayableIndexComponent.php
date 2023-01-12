<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Session;
use Livewire\WithPagination;

class AccountPayableIndexComponent extends Component
{
    public $status;

    use WithPagination;

    public function render()
    {
        return view('livewire.account-payable-index-component',[
            // 'accountpayables' => Property::find(Session::get('property'))->accountpayables()->orderBy('created_at', 'desc')->paginate(10),
            'accountpayables' => Property::find(Session::get('property'))->accountpayables()
            ->when($this->status, function ($query) {
            $query->where('status', $this->status);
            })->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
