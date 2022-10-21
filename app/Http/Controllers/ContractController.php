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

    public function show_moveout_request($property_uuid, $status=null)
    {
        $this->authorize('is_contract_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',5);

       $contracts = Contract::where('property_uuid', $property_uuid)
        ->when($status, function ($query) use ($status) {
        $query->where('created_at', $status);
        })
       ->get();

       return view('contracts.index',[
        'contracts' => $contracts
       ]);
    }

    public function index($property)
    {
        return Contract::where('property_uuid', $property)->where('status', 'active')->orderBy('start', 'asc')->get();
    }

    public function get_property_contracts($property_uuid, $status, $dateBeforeExpiration, $movein, $moveout)
    {
        return Property::find($property_uuid)->contracts()
        ->when($status, function ($query) use ($status) {
          $query->where('status', $status);
        })
        ->when($dateBeforeExpiration, function ($query) use ($dateBeforeExpiration) {
          $query->where('end','<=', $dateBeforeExpiration);
        })
        ->when($movein, function ($query) use ($movein) {
          $query->whereMonth('start', $movein);
        })
        ->when($moveout, function ($query) use ($moveout) {
          $query->whereMonth('end', $moveout);
        })
        ->orderBy('start', 'desc')
        ->get();
    }

    public function get_contracts_trend_count($property_uuid)
    {
       return DB::table('contracts')
       ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as contracts'))
       ->whereMonth('start', Carbon::now()->month)
       ->orderBy('date', 'desc')
       ->groupBy('date')
       ->pluck('contracts');
    }


    public function get_contracts_trend_date($property_uuid)
    {
       return DB::table('contracts')
        ->whereMonth('start', Carbon::now()->month)
       ->select(DB::raw("(DATE_FORMAT(start,'%D')) as date"), DB::raw('count(*) as contracts'))
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
        $this->authorize('is_contract_create_allowed');

        return view('contracts.create', [
            'unit' => $unit,
            'tenant' => $tenant
        ]);
    }

    public function store(Unit $unit, Tenant $tenant)
    {   
        $contract_attributes = request()->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'rent' => 'required',
            'discount' => 'required',
            'interaction' => 'required'
        ]);

        $contract_uuid = Str::uuid();

        try {
            DB::beginTransaction();

              $contract_attributes['uuid'] = $contract_uuid;
              $contract_attributes['tenant_uuid'] = $tenant->uuid;
              $contract_attributes['unit_uuid'] = $unit->uuid;
              $contract_attributes['user_id'] = auth()->user()->id;
              $contract_attributes['status'] = 'pendingmovein';

              Contract::create($contract_attributes);

            //   Unit::where('uuid', $unit->uuid)->update([
            //   'status_id' => 4
            //   ]);

            DB::commit();

              return
              redirect('/unit/'.$unit->uuid.'/tenant/'.$tenant->uuid.'/contract/'.$contract_uuid.'/bill/'.Str::random(8).'/create')->with('success','New
              contract has been created.');

        } catch (\Throwable $e) {
            DB::rollback();
           session()->flash('error');
        }
    }

    public function edit(Property $property, Tenant $tenant, Contract $contract)
    {
        $this->authorize('is_contract_update_allowed');

        return view('contracts.edit',[
          'contract' => Contract::findOrFail($contract->uuid),
          'property' => Property::find(Session::get('property')),
        ]);
    }

    public function preview(Contract $contract)
    {
         Session::flash('success', 'Premove-in processed hasbeen completed.');
         
        return view('contracts.edit',[
        'contract' => Contract::findOrFail($contract->uuid),
        'property' => Property::find(Session::get('property')),
        ]);
    }

    public function update(Request $request, Contract $contract)
    {
        //
    }

    public function moveout(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.moveout', [
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

         $property = Property::find(Session::get('property'));
        
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

         $canvas->page_text($width/5, $height/2, $property->property, null,
         55, array(0,0,0),2,2,-30);

          return $pdf->download($contract->tenant->tenant.'-contract.pdf');

    }

    public function transfer(Property $property, Tenant $tenant, Contract $contract)
    {
        return view('contracts.transfer',[
            'contract_details' => $contract
        ]);
    }

    public function new(Property $property, Tenant $tenant)
    {
        return view('contracts.new-contract',[
            'tenant' => $tenant
        ]);
    }

    public function destroy()
    {
         $this->authorize('is_contract_delete_allowed');
    }
}
