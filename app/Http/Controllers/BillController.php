<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Contract;
use Carbon\Carbon;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, $batch_no=null)
    {
        $this->authorize('billing');
                
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',10);

        $particulars = app('App\Http\Controllers\PropertyParticularController')->show($property->uuid);

        return view('bills.index',[
            'active_contracts' => Contract::where('property_uuid', Session::get('property'))->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', Session::get('property'))->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => $particulars,
            'batch_no' => $batch_no
        ]);
    }

    public function get_latest_bill_no($property_uuid)
    {
        return Property::find($property_uuid)->bills->max('bill_no')+1;
    }

    public function generate_bill_reference_no($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }

    public function generate_bill_batch_no($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit, Tenant $tenant, Contract $contract)
    {
        $bills = Tenant::find($tenant->uuid)->bills;
       
        $particulars = app('App\Http\Controllers\PropertyParticularController')->show(Session::get('property'));

        return view('bills.create',[
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
        return Unit::findOrFail($unit_uuid)->bills()->paginate(5);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Property $property, Tenant $tenant)
    {   
        //  if($this->rent > 0)
        //  {
        //  for($i=1; $i<=2; $i++) { Bill::create([ 'bill_no'=> $bill_no++,
        //      'bill' => $this->rent,
        //      'reference_no' => $this->tenant->bill_reference_no,
        //      'start' => Carbon::parse($this->start)->addMonth(),
        //      'end' => Carbon::parse($this->start)->addMonths(2),
        //      'due_date' => Carbon::parse($this->start)->addDays(7),
        //      'description' => 'movein charges',
        //      'user_id' => auth()->user()->id,
        //      'particular_id' => $i,
        //      'property_uuid' => Session::get('property'),
        //      'unit_uuid' => $this->unit->uuid,
        //      'tenant_uuid' => $this->tenant->uuid,
        //      ]);
        //      }

        //      for($i=3; $i<=4; $i++) { Bill::create([ 'bill_no'=> $bill_no++,
        //          'bill' => $this->rent,
        //          'reference_no' => $this->tenant->bill_reference_no,
        //          'start' => $this->start,
        //          'end' => $this->end,
        //          'due_date' => Carbon::parse($this->start)->addDays(7),
        //          'description' => 'movein charges',
        //          'user_id' => auth()->user()->id,
        //          'particular_id' => $i,
        //          'property_uuid' => Session::get('property'),
        //          'unit_uuid' => $this->unit->uuid,
        //          'tenant_uuid' => $this->tenant->uuid,
        //          ]);
        //          }
        //          }

        //          if($this->discount > 0){
        //          Bill::create([
        //          'bill_no' => $bill_no++,
        //          'bill' => -($this->discount),
        //          'reference_no' => $this->tenant->bill_reference_no,
        //          'start' => $this->start,
        //          'end' => Carbon::parse($this->start)->addMonth(),
        //          'due_date' => Carbon::parse($this->start)->addDays(7),
        //          'description' => 'movein charges',
        //          'user_id' => auth()->user()->id,
        //          'particular_id' => '8',
        //          'property_uuid' => Session::get('property'),
        //          'unit_uuid' => $this->unit->uuid,
        //          'tenant_uuid' => $this->tenant->uuid,
        //          'due_date' => Carbon::parse($this->start)->addDay(),
        //          ]);
        //          }

        //  $attributes = request()->validate([
        //     'particular_id' => ['required', Rule::exists('particulars', 'id')],
        //     'bill' =>'required',
        //     'start' => 'required|date',
        //     'end' => 'required|date|after:start'
        //  ]);

        // $bill_no = $this->get_latest_bill_no($property->uuid);

        // try {

        //     $attributes['reference_no'] = Carbon::now()->timestamp.''.$bill_no++;
        //     $attributes['tenant_uuid'] = $tenant->uuid;
        //     $attributes['unit_uuid'] = $request->unit_uuid;
        //     $attributes['property_uuid'] = Session::get('property');
        //     $attributes['user_id'] = auth()->user()->id;
        //     $attributes['bill_no'] = $bill_no;
        //     $attributes['due_date'] = Carbon::now()->addDays(14);
        
        //     Bill::create($attributes);
            
        //     DB::commit();

        //     return back()->with('success', 'Bill has been created.');
            
        // }catch (\Exception $e) {
        //     DB::rollback();
           
        //     return back()->with('error','Cannot complete your action.');
        // }   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $this->authorize('manager');

        $bill = Bill::where('id', $id);
        if($bill->delete()){
            return back()->with('success', 'Bill has been removed.');
        }
            return back()->with('error', 'Cannot complete your action.');
    }
}
