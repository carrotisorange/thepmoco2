<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Xendit\Xendit;
use App\Models\Tenant;
use Str;

class TenantPortalBillComponent extends Component
{
    public $tenant;



    public $selectedBills = [];

    public function payBills()
    {
        $amount_to_be_paid = ($this->get_unpaid_bills($this->selectedBills) +
        $this->partially_paid_bills($this->selectedBills)) - $this->paid_bills($this->selectedBills);

        Xendit::setApiKey(config('services.xendit.xendit_secret_key_dev'));

        $params = [
        'token_id' => '5e2e8231d97c174c58bcf644',
        'external_id' => 'card_' . time(),
        'authentication_id' => '5e2e8658bae82e4d54d764c0',
        'amount' => 100000,
        'card_cvn' => '123',
        'capture' => false
        ];

        $createCharge = \Xendit\Cards::create($params);
        var_dump($createCharge);
    }

    public function get_unpaid_bills($selectedBills)
    {
        return Tenant::find($this->tenant->uuid)
        ->bills()
        ->where('status', 'unpaid')
        ->whereIn('id', $selectedBills)
        ->sum('bill');
    }

    public function partially_paid_bills($selectedBills)
    {
        return Tenant::find($this->tenant->uuid)
        ->bills()
        ->where('status', 'partially_paid')
        ->whereIn('id', $selectedBills)
        ->sum('bill') - Tenant::find($this->tenant->uuid)
        ->bills()
        ->where('status', 'partially_paid')
        ->whereIn('id', $selectedBills)
        ->sum('initial_payment');
    }

    public function paid_bills($selectedBills)
    {
        return Tenant::find($this->tenant->uuid)
        ->bills()
        ->where('status', 'paid')
        ->whereIn('id', $selectedBills)
        ->sum('bill');
    }

    public function render()
    {

        $unpaid_bills = $this->get_unpaid_bills($this->selectedBills);

        $partially_paid_bills = $this->partially_paid_bills($this->selectedBills);

        $paid_bills = $this->paid_bills($this->selectedBills);

       $bills = app('App\Http\Controllers\TenantPortalController')->get_bills($this->tenant->uuid);

        return view('livewire.tenant-portal-bill-component',[
            'bills' => $bills,
            'total' => ($unpaid_bills + $partially_paid_bills) - $paid_bills,
            'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
        ]);
    }
}
