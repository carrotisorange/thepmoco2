<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Xendit\Xendit;
use App\Models\Tenant;
use Str;
use App\Models\PaymentRequest;
use App\Models\Bill;
use DB;

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
        $amount_to_be_paid = ($this->get_unpaid_bills($this->selectedBills) +
        $this->partially_paid_bills($this->selectedBills)) - $this->paid_bills($this->selectedBills);

        $batch_no = auth()->user()->id.'_'.Str::random(8);

        $request_id = PaymentRequest::create([
            'tenant_uuid' => $this->tenant->uuid,
            'bill_nos' =>Bill::whereIn('id', $this->selectedBills)->pluck('bill_no'),
            'amount' => $amount_to_be_paid,
            'batch_no' => $batch_no,
            'status' => 'pending',
        ]);

        return redirect(auth()->user()->role_id.'/tenant/'. auth()->user()->username.'/payments_request/'.$batch_no)->with('success', 'Success!');
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
        $statuses = Bill::where('tenant_uuid', $this->tenant->uuid)
        ->groupBy('status')
        ->get();
        
        $start_dates = Bill::where('tenant_uuid', $this->tenant->uuid)
        ->select('*',DB::raw("(DATE_FORMAT(start,'%M %d, %Y')) as period_covered_start"), DB::raw('count(*) as count'))
        ->groupBy('period_covered_start')
        ->orderBy('start')
        ->get();

        $end_dates = Bill::where('tenant_uuid', $this->tenant->uuid)
        ->select('*',DB::raw("(DATE_FORMAT(end,'%M %d, %Y')) as period_covered_end"), DB::raw('count(*) as count'))
        ->groupBy('period_covered_end')
        ->orderBy('end')
        ->get();
        
        //$particulars = app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property'));

        $unpaid_bills = $this->get_unpaid_bills($this->selectedBills);

        $partially_paid_bills = $this->partially_paid_bills($this->selectedBills);

        $paid_bills = $this->paid_bills($this->selectedBills);

        $bills = app('App\Http\Controllers\PortalTenantController')->get_bills($this->tenant->uuid);

        return view('livewire.tenant-portal-bill-component',[
           'bills' => Bill::orderBy('bill_no', 'desc')
           ->where('tenant_uuid', $this->tenant->uuid)
           ->where('is_posted', true)
           ->whereNotIn('particular_id',['71', '72'])
           ->when($this->status, function($query){
           $query->whereIn('status', [$this->status]);
            })
            ->when($this->start_date, function($query){
                $query->whereBetween('start', [$this->start_date, $this->end_date]);
            })
            ->when($this->end_date, function($query){
                $query->whereBetween('end', [$this->start_date, $this->end_date]);
            })
            ->get(),
            'total' => ($unpaid_bills + $partially_paid_bills) - $paid_bills,
            'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
            'statuses' => $statuses,
            'start_dates' => $start_dates,
            'end_dates' => $end_dates,
            //'particulars' => $particulars
        ]);
    }
}
