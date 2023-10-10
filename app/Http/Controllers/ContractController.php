<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use Session;
use DB;
use Carbon\Carbon;

class ContractController extends Controller
{

    public function index(Property $property){

        $featureId = 6;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$restrictionId,$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.contracts.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid, $tenant_uuid){
        Contract::where('unit_uuid', $unit_uuid)
        ->orWhere('tenant_uuid', $tenant_uuid)->delete();
    }

    public function show(Property $property, Unit $unit, Tenant $tenant, Contract $contract){

        // $this->authorize('is_contract_read_allowed');

        return view('properties.contracts.show',[
            'contract' => $contract,
            'tenant' => $tenant
        ]);
    }
    public function show_moveout_request($property_uuid, $status=null)
    {
       // $this->authorize('is_contract_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',5);

       $contracts = Contract::where('property_uuid', $property_uuid)
        ->when($status, function ($query) use ($status) {
        $query->where('created_at', $status);
        })
       ->paginate(10);

       return view('contracts.index',[
        'contracts' => $contracts
       ]);
    }

    // public function getContracts($property)
    // {
    //     return Contract::where('property_uuid', $property)->where('status', 'active')->orderBy('start', 'asc')->get();
    // }

    public function getContracts($property_uuid)
    {
        return Property::find($property_uuid)->contracts();
        // ->when($status, function ($query) use ($status) {
        //   $query->where('status', $status);
        // })
        // ->when($dateBeforeExpiration, function ($query) use ($dateBeforeExpiration) {
        //   $query->where('end','<=', $dateBeforeExpiration);
        // })
        // ->when($movein, function ($query) use ($movein) {
        //   $query->whereMonth('start', $movein);
        // })
        // ->when($moveout, function ($query) use ($moveout) {
        //   $query->whereMonth('end', $moveout);
        // })
        // ->orderBy('start', 'desc')
        // ->get();
    }

    public function get_contracts_trend_count($property_uuid)
    {
       return DB::table('contracts')
       ->whereMonth('start', Carbon::now()->month)
       ->select(DB::raw("(DATE_FORMAT(start,'%M %Y')) as date"), DB::raw('count(*) as contracts'))
       ->orderBy('date', 'desc')
       ->groupBy('date')
       ->pluck('contracts');
    }


    public function get_contracts_trend_date($property_uuid)
    {
       return DB::table('contracts')
        ->whereMonth('start', Carbon::now()->month)
       ->select(DB::raw("(DATE_FORMAT(start,'%M %Y')) as date"), DB::raw('count(*) as contracts'))
       ->orderBy('date', 'desc')
       ->groupBy('date')
       ->pluck('date');
    }

    public function show_unit_contracts($unit_uuid)
    {
        return Unit::findOrFail($unit_uuid)->contracts()->orderBy('start', 'desc')->get();
    }

    public function get_property_moveins($property_uuid, $daily, $monthly)
    {
        return Property::find($property_uuid)->contracts()
        ->where('status', 'active')
         ->when($daily, function ($query) use ($daily) {
          $query->whereDate('start', $daily);
        })
         ->when($monthly, function ($query) use ($monthly) {
          $query->whereMonth('start', $monthly);
        })

        ->get();
    }

    public function get_property_moveouts($property_uuid, $daily, $monthly)
    {
        return Property::find($property_uuid)->contracts()
        ->where('status', 'inactive')
         ->when($daily, function ($query) use ($daily) {
          $query->whereDate('end', $daily);
        })
         ->when($monthly, function ($query) use ($monthly) {
          $query->whereMonth('end', $monthly);
        })

        ->get();
    }

    public function create(Property $property, Unit $unit, Tenant $tenant)
    {
       // $this->authorize('is_contract_create_allowed');

        return view('contracts.create', [
            'unit' => $unit,
            'tenant' => $tenant
        ]);
    }

    public function store($user_id, $contract_uuid, $property_uuid, $start, $end, $interaction_id, $rent, $tenant_uuid, $unit_uuid, $contract_status, $unit_status, $tenant_status, $point, $action_id, $referral, $sendContractToTenant)
    {
          Contract::create([
            'user_id' => $user_id,
            'uuid' => $contract_uuid,
            'property_uuid' => $property_uuid,
            'start' => $start,
            'end' => $end,
            'interaction_id' => $interaction_id,
            'rent' => $rent,
            'tenant_uuid' => $tenant_uuid,
            'unit_uuid' => $unit_uuid,
            'status' => $contract_status
          ]);

          //update status of the selected unit
          app('App\Http\Controllers\UnitController')->updateUnitStatus($unit_uuid, $unit_status);

          //update status of the tenant
          app('App\Http\Controllers\TenantController')->update_tenant_status($tenant_uuid, $tenant_status);

          //store new point
          app('App\Http\Controllers\PointController')->store($property_uuid, $user_id ,$point, $action_id);

          //store new referral
          if($referral)
          {
            app('App\Http\Controllers\ReferralController')->store($referral, $contract_uuid, $property_uuid);
          }

          if($sendContractToTenant)
          {
            $tenant = Tenant::find($tenant_uuid);
            $unit = Unit::find($unit_uuid);

            app('App\Http\Controllers\TenantController')->send_mail_to_tenant($tenant->email, $tenant->tenant, Carbon::parse($start)->format('M d, Y'),Carbon::parse($end)->format('M d, Y'), $rent, $unit->unit);
          }
    }

    public function edit(Property $property, Tenant $tenant, Contract $contract)
    {
       // $this->authorize('is_contract_update_allowed');

        return view('contracts.edit',[
          'contract' => Contract::findOrFail($contract->uuid),
          'property' => Property::find(Session::get('property_uuid')),
        ]);
    }

    public function preview(Contract $contract)
    {
         Session::flash('success', 'Premove-in processed hasbeen completed.');

        return view('contracts.edit',[
        'contract' => Contract::findOrFail($contract->uuid),
        'property' => Property::find(Session::get('property_uuid')),
        ]);
    }

    public function update($validatedData)
    {
        ddd($validatedData);
    }

    public function moveout_step_1(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.moveouts.step-1', [
            'ismovein' => 'moveout',
            'property' => $property,
            'contract' => $contract
        ]);
    }

    public function moveout_step_2(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.moveouts.step-2', [
            'contract' => $contract
        ]);
    }


    public function moveout_step_3(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.moveouts.step-3', [

            'property' => $property,
            'tenant' => $tenant,
            'contract' => $contract
        ]);
    }

    public function export_clearance_form(Property $property, Tenant $tenant, Contract $contract){

         $data = [
            'contract' => $contract
        ];

        $pdf = \PDF::loadView('contracts.moveouts.clearance', $data);

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2,"", null,
         55, array(0,0,0),2,2,-30);

        return $pdf->stream($contract->uuid.'.pdf');

    }


    public function moveout_step_4(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.moveouts.step-4', [
            'property' => $property,
            'contract' => $contract,
            'tenant' => $tenant
        ]);
    }

    public function moveout_step_5(Property $property, Tenant $tenant, Contract $contract)
    {
    return view('contracts.moveouts.step-5', [
    'contract' => $contract
    ]);
    }

    public function renew(Property $property, Tenant $tenant, Contract $contract)
    {
        Session::put('tenant_uuid', $tenant->uuid);

         Session::forget('tenant_uuid');

         Session::forget('owner_uuid');

         return view('contracts.renew',[
            'contract_details' => $contract
         ]);
    }

    public function export(Property $property, Tenant $tenant, Contract $contract)
    {
        $reference_no = Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
        ->select('*', 'bills.status as bill_status', 'bills.id as bill_id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('tenants.uuid', $contract->tenant->uuid)
        ->orderBy('bills.bill_no')
        ->limit(1)
        ->get('reference_no');

         $property = Property::find(Session::get('property_uuid'));

        $bills = Tenant::find($contract->tenant_uuid)->bills;

        $data = [
            'tenant' => $contract->tenant->tenant ,
            'unit' => $contract->unit->building->building.' '.$contract->unit->unit,
            'start' => $contract->start,
            'end' => $contract->end,
            'rent' => $contract->rent,
            'discount' => $contract->discount,
            'status' => $contract->status,
            'interaction' => $contract->interaction,
            'moveout_reason' => $contract->moveout_reason,
            'user' => $contract->user->name,
            'bills' => $bills,
            'reference_no' => $reference_no,
            'guardians' => Tenant::find($contract->tenant_uuid)->guardians,
            'references' => Tenant::find($contract->tenant_uuid)->references,
            'user' => $contract->user->name
        ];

        $pdf = \PDF::loadView('contracts.export', $data);

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, "", null,
         55, array(0,0,0),2,2,-30);

          return $pdf->stream($contract->tenant->tenant.'-contract.pdf');

    }

    public function transfer(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.transfer',[
            'contract_details' => $contract
        ]);
    }

    public function movein(Property $property, Unit $unit, Tenant $tenant, Contract $contract)
    {
        return view('contracts.movein', [
            'unit' => $unit,
            'tenant' => $tenant,
            'contract' => $contract,
        ]);
    }

    public function new(Property $property, Tenant $tenant)
    {
        return view('contracts.new-contract',[
            'tenant' => $tenant
        ]);
    }

    public function export_moveout_form(Property $property, Tenant $tenant, Contract $contract){
        return view('contracts.moveouts.clearance');
    }

    public function force_moveout(Request $request, Property $property, Contract $contract){

        Contract::where('uuid', $contract->uuid)
        ->update([
            'status' => 'forcedmoveout',
            'remarks' => $request->remarks
        ]);

        Tenant::where('uuid', $contract->tenant_uuid)
        ->update([
            'status' => 'forcedmoveout'
        ]);

        return redirect('/property/'.$property->uuid.'/tenant/'.$contract->tenant_uuid.'/contract/'.$contract->uuid.'/moveout/step-4')->with('success','Step 2 of 4 has been accomplished!');

    }
}
