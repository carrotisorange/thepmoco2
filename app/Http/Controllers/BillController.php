<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Session;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendBillToTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\Owner;
use App\Models\Guest;
use App\Models\Particular;

class BillController extends Controller
{

     public function index(Property $property, $batch_no=null, $drafts=0){

        $featureId = 11;

        $restrictionId = 2;

         if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
         }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$restrictionId,$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.bills.index',[
            'active_contracts' => Contract::where('property_uuid', $property->uuid)->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', $property->uuid)->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($property->uuid),
            'batch_no' => $batch_no,
            'drafts' => $drafts,
            'property' => $property,
        ]);
    }

    public function tenant_index(Property $property, Tenant $tenant)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens', 10);

        return view('features.tenants.bills.index',[
        'tenant' => $tenant,
        'property' => $property,
        ]);
    }

    public function bulk_edit(Property $property, $batch_no)
    {
        $particulars = Particular::join('property_particulars', 'particulars.id', 'property_particulars.particular_id')

        ->where('property_uuid', $property->uuid)
        ->get();

        return view('features.bills.edit', [
            'property' => $property,
            'batch_no' => $batch_no,
            'particulars' => $particulars
        ]);
    }

    public function owner_index(Property $property, Owner $owner)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens', 10);

        return view('features.owners.bills.index',[
        'owner' => $owner,
        'property' => $property,
        ]);
    }

    public function getBills($property_uuid){
        return Property::find($property_uuid)->bills()->posted();
    }


  public function send_bills(Request $request, Property $property, Tenant $tenant)
    {
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        Mail::to($request->email)->send(new SendBillToTenant($data));

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }



    public function store($property_uuid, $unit_uuid, $tenant_uuid, $owner_uuid, $particular_id, $start_date, $end_date, $total_amount_due, $batch_no, $posted){
        Bill::create(
        [
            'unit_uuid' => $unit_uuid,
            'particular_id' => $particular_id,
            'start' => $start_date,
            'end' => $end_date,
            'bill' => $total_amount_due,
            'batch_no' => $batch_no,
            'property_uuid' => $property_uuid,
            'bill_no'=> $this->getLatestBillNo($property_uuid),
            'user_id' => auth()->user()->id,
            'due_date' => Carbon::parse($start_date)->addDays(7),
            'is_posted' => $posted,
            'tenant_uuid' => $tenant_uuid,
            'owner_uuid' => $owner_uuid
         ]
         );
    }

    public function drafts($property_uuid,$batch_no){

        return view('features.bills.drafts', [
            'property_uuid' => $property_uuid,
            'batch_no' => $batch_no
        ]);
    }

    public function export_soa(Request $request, Property $property, Tenant $tenant)
    {
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        $folder_path = 'features.tenants.bills.export';

        $pdf = app('App\Http\Controllers\ExportController')->generatePDF($folder_path, $data);

        $pdf_name = str_replace(' ', '_', $property->property).'_SOA.pdf';

        return $pdf->stream($pdf_name);
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
            'bills' => Bill::where('tenant_uuid', $tenant->uuid)->posted()->where('status','unpaid')->orderBy('bill_no', 'desc')->get(),
            'balance' => $balance,
            'balance_after_due_date' => $balance + $penalty,
            'note_to_bill' => $note,
        ];
    }

    public function create_new(Property $property, Unit $unit, Tenant $tenant, Contract $contract){
        return view('features.bills.create-new',[
            'property' => $property,
          'unit' => Unit::find($unit->uuid),
          'tenant' => $tenant,
          'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($property->uuid),
            'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($tenant->uuid),
            'bills' => app('App\Http\Controllers\BillController')->show_tenant_bills($tenant->uuid),
            'contract' => $contract
        ]);
    }

    public function show_tenant_bills($tenant_uuid)
    {
       return Bill::where('tenant_uuid', $tenant_uuid)->posted()->where('bill','>',0)->orderBy('created_at','desc')->get();
    }

    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_tenant_balance($tenant_uuid)
    {
        return Bill::where('tenant_uuid', $tenant_uuid)->where('status','unpaid')->orderBy('bill_no','desc')->get();
    }

    public function get_property_bills($property_uuid, $month, $status)
    {
        $bills = '';

        if($status == 'paid')
        {
              $bills = Collection::where('property_uuid',$property_uuid)->posted()
               ->when($month, function ($query) use ($month) {
               $query->whereMonth('created_at', $month);
               })
               ->sum('collection');

        }else{
              $bills = Bill::where('property_uuid', $property_uuid)->posted()
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month);
            })->sum('bill')-

              Collection::where('property_uuid',$property_uuid)->posted()
              ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month);
              })
              ->sum('collection');


        }

        return $bills;

    }


    public function get_unit_bills($unit_uuid, $month, $status)
    {
        if($status == 'paid')
        {
            $bills = Unit::find($unit_uuid)->bills()
              ->posted()
              ->where('status', 'paid')
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('initial_payment');


        }else{
              $bills = Unit::find($unit_uuid)->bills()
                ->posted()
              ->where('status', 'unpaid')
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('bill') -

              Unit::find($unit_uuid)->bills()
                ->posted()
              ->where('status', 'unpaid')
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('initial_payment');
        }

        return $bills;

    }

    public function getLatestBillNo($property_uuid)
    {
        return sprintf('%08d',Property::find($property_uuid)->bills()->withTrashed()->max('bill_no')+1);
    }

    public function generate_bill_reference_no($type, $bill_no)
    {
        return $type.Carbon::now()->timestamp.''.$bill_no;
    }

    public function generate_bill_batch_no($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }

    public function create(Unit $unit, Tenant $tenant, Contract $contract)
    {
        // $this->authorize('is_account_receivable_create_allowed');

        $bills = Tenant::find($tenant->uuid)->bills;

        $particulars = app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid'));

        return view('features.bills.create',[
            'unit' => $unit,
            'tenant' => $tenant,
            'contract' => $contract,
            'bills' => $bills,
            'particulars' => $particulars,
            'units' => Tenant::find($tenant->uuid)->contracts
        ]);
    }

    public function show_unit_bills($unit_uuid)
    {
        return Bill::where('unit_uuid', $unit_uuid)->posted()->where('bill','>', 0)->orderBy('created_at','desc')->get();
    }

    public function update_bill_amount_due($bill_id, $status)
    {
         Bill::where('id', $bill_id)
         ->update([
             'status' => $status,
         ]);
    }

    public function update_bill_initial_payment($bill_id,$amount)
    {
        Bill::where('id', $bill_id)->increment('initial_payment', $amount);
    }


    public function delete_bills($tenant_uuid){
        Bill::where('tenant_uuid', $tenant_uuid)->delete();
    }


    public function edit(Property $property, $batch_no)
    {
        $particulars = Particular::join('property_particulars', 'particulars.id', 'property_particulars.particular_id')

        ->where('property_uuid', $property->uuid)
        ->get();

        return view('features.bills.edit', [
            'property' => $property,
            'batch_no' => $batch_no,
            'particulars' => $particulars
        ]);
    }

    public function destroy($unit_uuid){
        Bill::where('unit_uuid', $unit_uuid)->delete();
    }

    public function confirm_bill_deletion(Property $property, $batch_no, $bills_count){
        $bills = Bill::where('property_uuid', $property->uuid)->where('batch_no', $batch_no)->get();

        return view('properties.bills.confirm-deletion', [
            'bills' => $bills,
            'view' => 'listView',
            'isPaymentAllowed' => false,
            'isIndividualView' => false,

        ]);
    }

    public function edit_bill(Property $property, Guest $guest, Bill $bill){

        return view('properties.bills.edit', [
            'property' => $property,
            'bill' => $bill
        ]);
    }
}
