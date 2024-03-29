<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\SendBillToTenant;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportBill;
use Illuminate\Support\Facades\DB;
use App\Models\{Bill, Property, Unit, Tenant, Contract, Collection, User, Owner, Guest, Particular};
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
     public function index(Property $property, $batch_no=null, $drafts=0){

        $featureId = 11; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);


        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.bills.index',[
            'active_contracts' => Contract::where('property_uuid', $property->uuid)->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', $property->uuid)->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => app('App\Http\Controllers\Utilities\PropertyParticularController')->index($property->uuid),
            'batch_no' => $batch_no,
            'drafts' => $drafts,
        ]);
    }

    public function get($isPosted=null, $status=null, $groupBy=null, $createdAt=null, $particularId=null, $billTo=null)
    {
        return Bill::getAll(Session::get('property_uuid'), $isPosted, $status, $groupBy, $createdAt, $particularId, $billTo);
    }

    public function getJsonEncodedBillForDashboard($status=null){

        $data = Bill::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('monthname(created_at) as month_name, sum(bill) as total'))
        ->posted()
          ->when($status, function($query, $status){
            $query->where('status', $status);
        })
        ->groupBy(DB::raw('month(created_at)+"-"+year(created_at)'))
        ->orderBy(DB::raw('month(created_at)'));

        $jsonString = $data->get('month_name','total');

        $newFormatData = [];

        foreach ($jsonString as $dataPoint) {
            $newFormatData[] = [
                "x" => $dataPoint["month_name"],
                "y" => $dataPoint["total"],
            ];
        }

       return json_encode($newFormatData);
    }

    public function showDelinquents(){
        return view('features.bills.delinquents',[
            'delinquents' => $this->getDelinquentTenants()
        ]);
    }

    public function getDelinquentTenants(){
        return Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
        ->select(DB::raw('sum(bill) as totalBill, tenant, email, tenant_uuid'))
        ->where('bills.property_uuid',Session::get('property_uuid'))
        ->whereMonth('bills.start','<=', Carbon::now()->subMonth()->month)
        ->where('bills.status', 'unpaid')
        ->where('bill','>',0)
        ->groupBy('bills.tenant_uuid')
        ->orderBy('totalBill', 'desc')
        ->get();
    }

    public function export($property_uuid, $format){

        if($format == 'pdf'){
            $data = [
                'bills' => app('App\Http\Controllers\Features\BillController')->get(1, 'unpaid', null, Session::get('billCreatedAt'), Session::get('billParticularId'),Session::get('billType'))
            ];

            $folder_path = 'features.bills.export';

            $perspective = 'portrait';

            $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

            $pdf_name = str_replace(' ', '_', Session::get('property')).'_bills.pdf';

            return $pdf->stream($pdf_name);

        }elseif($format == 'excel'){

            $fileName = str_replace(' ', '_', Session::get('property')).'_bills_'.str_replace(' ', '_',Carbon::now()->format('M d, Y')).'.xlsx';

            ob_end_clean(); // this
            ob_start(); // and this

            return Excel::download(new ExportBill(), $fileName);
        }


    }

    public function tenant_index(Property $property, Tenant $tenant)
    {
        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens',10);

        return view('features.tenants.bills.index',[
        'tenant' => $tenant,
        'property' => $property,
        ]);
    }

     public function showBills(Property $property, $type, $uuid)
    {
        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens',10);

        return view('features.bills.type.index',[
            'type' => $type,
            'uuid' => $uuid,
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
        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens',10);

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
        app('App\Http\Controllers\PropertyController')->updateNoteToBill($request->note_to_bill);

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
            'bill_no'=> $this->getLatestBillNo(),
            'user_id' => auth()->user()->id,
            'due_date' => Carbon::parse($start_date)->addDays(7),
            'is_posted' => $posted,
            'tenant_uuid' => $tenant_uuid,
            'owner_uuid' => $owner_uuid
         ]
         );
    }

    public function storeTenantBill($particularId, $bill, $unitUuid, $start, $end, $type, $uuid){
        try {

            DB::beginTransaction();

            $bill_no = app('App\Http\Controllers\Features\BillController')->getLatestBillNo();

            if($particularId === '8'){
                $bill *=-1;
            }
            else{
                $bill = $bill;
            }

            if($type=='tenant'){
                $contractUuid = Contract::where('unit_uuid', $unitUuid)->where($type.'_uuid', $uuid)->pluck('uuid')->last();
            }else{
                $contractUuid = null;
            }

            $newBill = Bill::insertGetId([
                'bill_no' => $bill_no,
                'unit_uuid' => $unitUuid,
                'particular_id' => $particularId,
                'start' => $start,
                'end' => $end,
                'bill' => $bill,
                'due_date' => Carbon::parse($start)->addDays(7),
                'user_id' => auth()->user()->id,
                'property_uuid' => Session::get('property_uuid'),
                $type.'_uuid' => $uuid,
                'status' => 'unpaid',
                'created_at' => Carbon::now(),
                'is_posted' => true,
                'contract_uuid' => $contractUuid,
            ]);

            Log::info('Inserted bill id '. $newBill);

            app('App\Http\Controllers\Utilities\PointController')->store(1, 3);

            DB::commit();

            return redirect(url()->previous())->with('success', 'Changes Saved!');
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Log::error($e);
            return redirect(url()->previous())->with('error', $e);
        }
    }

    public function drafts($property_uuid,$batch_no){

        return view('features.bills.drafts', [
            'property_uuid' => $property_uuid,
            'batch_no' => $batch_no
        ]);
    }

    public function export_soa(Request $request, Property $property, Tenant $tenant)
    {
        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        $folder_path = 'export.soa';

        $perspective = 'portrait';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

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
            $balance = $unpaid_bills - $paid_bills;
        }

        return $data = [
            'tenant' => $tenant->tenant,
            'reference_no' => $tenant->bill_reference_no,
            'due_date' => $due_date,
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
            'particulars' => app('App\Http\Controllers\Utilities\PropertyParticularController')->index($property->uuid),
            'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($tenant->uuid),
            'bills' => app('App\Http\Controllers\Features\BillController')->show_tenant_bills($tenant->uuid),
            'contract' => $contract,
            'type' => 'tenant',
            'uuid' => $tenant->uuid
        ]);
    }

    public function show_tenant_bills($tenant_uuid)
    {
       return Bill::where('tenant_uuid', $tenant_uuid)->posted()->orderBy('created_at','desc')->get();
    }

    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill');
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

    public function getLatestBillNo()
    {
        return sprintf('%08d',Property::find(Session::get('property_uuid'))->bills()->withTrashed()->max('bill_no')+1);
    }

    public function generate_bill_reference_no($type, $bill_no)
    {
        return $type.Carbon::now()->timestamp.''.$bill_no;
    }

    public function generateBillBatchNo($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }

    public function create(Unit $unit, Tenant $tenant, Contract $contract)
    {
        // $this->authorize('is_account_receivable_create_allowed');

        $bills = Tenant::find($tenant->uuid)->bills;

        $particulars = app('App\Http\Controllers\Utilities\PropertyParticularController')->index(Session::get('property_uuid'));

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
}
