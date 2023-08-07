<?php

namespace App\Http\Controllers;

use App\Mail\SendBillToTenant;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;

use App\Models\Collection;
use Illuminate\Support\Facades\Mail;


class TenantBillController extends Controller
{
    public function index(Property $property, Tenant $tenant)
    {            
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens', 10);

        return view('tenants.bills.index',[
            'tenant' => $tenant,  
            'property' => $property,
        ]);
    }

    public function show_tenant_bills($tenant_uuid)
    {
       return Bill::where('tenant_uuid', $tenant_uuid)->posted()->where('bill','>', 0)->orderBy('created_at','desc')->get();
    }

    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_tenant_balance($tenant_uuid)
    {
        return Bill::where('tenant_uuid', $tenant_uuid)->whereIn('status', ['unpaid', 'partially_paid'])->orderBy('bill_no','desc')->get();
    }

    public function export(Request $request, Property $property, Tenant $tenant)
    {
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        $folder_path = 'tenants.bills.export';

        $pdf = app('App\Http\Controllers\FileExportController')->generate_pdf($property, $data, $folder_path);

        return $pdf->stream(Carbon::now()->format('M d, Y').'-'.$tenant->tenant.'-soa.pdf');
    }

    public function send(Request $request, Property $property, Tenant $tenant)
    {    
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        Mail::to($request->email)->send(new SendBillToTenant($data));

        return back()->with('success', 'Success!');
    }

    public function get_bill_data($tenant, $due_date, $penalty, $note)
    {
         $unpaid_bills = Bill::where('tenant_uuid', $tenant->uuid)->posted()->sum('bill');
         $paid_bills = Collection::where('tenant_uuid', $tenant->uuid)->posted()->sum('collection');

        if($unpaid_bills<=0){ 
            $balance=0; 
        }else{ 
            $balance=$unpaid_bills - $paid_bills;
        }

        return $data = [
            'tenant' => $tenant->tenant,
            'reference_no' => $tenant->bill_reference_no,
            'due_date' => $due_date,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => Bill::where('tenant_uuid', $tenant->uuid)->posted()->whereIn('status', ['unpaid','partially_paid'])->orderBy('bill_no', 'desc')->get(),
            'balance' => $balance,
            'balance_after_due_date' => $balance + $penalty,
            'note_to_bill' => $note,
        ];
    }

    public function destroy($tenant_uuid){
        Bill::where('tenant_uuid', $tenant_uuid)->delete();
    }
}
