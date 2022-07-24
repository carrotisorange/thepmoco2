<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use App\Models\PropertyParticular;
use Session;
use DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property)
    {
        return Contract::where('property_uuid', $property)->where('status', 'active')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property, Unit $unit, Tenant $tenant)
    {
        return view('contracts.create', [
            'unit' => $unit,
            'tenant' => $tenant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
              $contract_attributes['status'] = 'pending';

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
            return back()->with('error','Cannot complete your action.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
