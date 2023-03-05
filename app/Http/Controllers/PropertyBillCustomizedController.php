<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Str;
use App\Models\Property;
use App\Models\Particular;
use Carbon\Carbon;
use Session;
use Illuminate\Validation\Rule;
use App\Models\Contract;
use App\Models\Tenant;

class PropertyBillCustomizedController extends Controller
{
    public function store(Request $request, Property $property, $bill_count)
    {
        $attributes = request()->validate([
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'due_date' => 'nullable|date|after:start',
            'bill' => 'nullable|numeric'
        ]);

        $tenant_uuid = Contract::where('property_uuid', $property->uuid)
        ->where('contracts.status','active')
        ->pluck('tenant_uuid');

        $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($property->uuid);

        $batch_no = app('App\Http\Controllers\BillController')->generate_bill_batch_no($bill_no);

        try{
            for($i=0; $i<$bill_count; $i++){ 
                $unit_uuid=Contract::where('property_uuid', $property->uuid)
                ->where('contracts.status','active')
                ->where('tenant_uuid', $tenant_uuid[$i])
                ->pluck('unit_uuid');

                $reference_no = Tenant::find($tenant_uuid[$i]);

                $rent = Contract::where('property_uuid', $property->uuid)
                ->where('contracts.status','active')
                ->where('tenant_uuid', $tenant_uuid[$i])
                ->pluck('rent');

                $attributes['unit_uuid']= $unit_uuid[0];
                $attributes['tenant_uuid'] = $tenant_uuid[$i];
                if($request->particular_id == 1)
                {
                    $attributes['bill'] = $rent[0];
                }elseif($request->particular_id == 8){
                    $attributes['bill'] = -($request->bill);
                }
                $attributes['bill_no'] = $bill_no++;
                $attributes['reference_no'] = $reference_no->bill_reference_no;
                $attributes['user_id'] = auth()->user()->id;
                $attributes['due_date'] = Carbon::parse($request->start)->addDays(7);
                $attributes['property_uuid'] = $property->uuid;
                $attributes['batch_no'] = $batch_no;

                    Bill::create($attributes);
                }

                return redirect('/property/'.$property->uuid.'/bill/customized/'.$batch_no.'/edit')->with('success', 'Success!');

            }catch(\Exception $e)
            {
                return back('error')->with('error', 'Cannot perform your action.');
            }
    }
    public function edit(Property $property, $batch_no)
    {
        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->get();

        return view('bills.edit', [
            'batch_no' => $batch_no,
            'particulars' => $particulars
        ]);
    }

    public function update(Request $request, $property_uuid, $batch_no)
    {

        $bills = Bill::where('property_uuid', $property_uuid)->where('batch_no', $batch_no)->count();

        for($i = 1; $i<=$bills; $i++){
            $bill=Bill::find(request('id'.$i));
            // $bill->created_at = request('created_at'.$i);
            $bill->start = request('start'.$i);
            $bill->end = request('end'.$i);
            $bill->bill = request('amount'.$i);
            $bill->save();
        }
        
        return redirect('/property/'.Session::get('property').'/bills')->with('success','Success!');
    }
}
