<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Str;
use DB;
use App\Models\{PaymentRequest,Bill,Tenant};

class TenantPortalBillComponent extends Component
{
    public $tenant;

    public $search;

    public $status;

    public $start_date;

    public $end_date;

    public $selectedBills = [];

    public function payBills()
    {
        $amount_to_be_paid = ($this->get_unpaid_bills($this->selectedBills)) - $this->paid_bills($this->selectedBills);

        $batch_no = auth()->user()->id.'_'.Str::random(8);

        $request_id = PaymentRequest::create(
            [
                'tenant_uuid' => $this->tenant->uuid,
                'bill_nos' => Bill::whereIn('id', $this->selectedBills)->pluck('bill_no'),
                'amount' => $amount_to_be_paid,
                'batch_no' => $batch_no,
                'status' => 'pending',
            ]
        );

        return redirect(auth()->user()->role_id.'/tenant/'. auth()->user()->username.'/payments_request/'.$batch_no)->with('success', 'Changes Saved!');
    }


    public function get_unpaid_bills($selectedBills)
    {
        return Tenant::find($this->tenant->uuid)
        ->bills()
        ->posted()
        ->where('status', 'unpaid')
        ->whereIn('id', $selectedBills)
        ->sum('bill');
    }

    public function paid_bills($selectedBills)
    {
        return Tenant::find($this->tenant->uuid)
        ->bills()
        ->posted()
        ->where('status', 'paid')
        ->whereIn('id', $selectedBills)
        ->sum('bill');
    }

    public function render()
    {
        $statuses = Bill::where('tenant_uuid', $this->tenant->uuid)
        ->groupBy('status')
        ->get();

        $start_dates = Bill::where('tenant_uuid', $this->tenant->uuid)
        ->select('*',DB::raw("(DATE_FORMAT(start,'%M %d, %Y')) as period_covered_start"), DB::raw('count(*) as count'))
        ->posted()
        ->groupBy('period_covered_start')
        ->orderBy('start')
        ->get();

        $end_dates = Bill::where('tenant_uuid', $this->tenant->uuid)
        ->select('*',DB::raw("(DATE_FORMAT(end,'%M %d, %Y')) as period_covered_end"), DB::raw('count(*) as count'))
        ->posted()
        ->groupBy('period_covered_end')
        ->orderBy('end')
        ->get();

        $unpaid_bills = $this->get_unpaid_bills($this->selectedBills);

        $paid_bills = $this->paid_bills($this->selectedBills);

        $bills = app('App\Http\Controllers\Portals\PortalTenantController')->get_bills($this->tenant->uuid);

        return view('livewire.portals.tenants.tenant-portal-bill-component',[

           'bills' =>  Bill::where('tenant_uuid', $this->tenant->uuid)
           ->posted()
            ->when($this->status, function($query){
             $query->whereIn('status', [$this->status]);
             })
           ->orderBy('id','desc')->get(),

            'total' => ($unpaid_bills) - $paid_bills,
            'total_unpaid_bills' => $bills->where('status','unpaid'),
            'statuses' => $statuses,
            'start_dates' => $start_dates,
            'end_dates' => $end_dates,
        ]);
    }
}
