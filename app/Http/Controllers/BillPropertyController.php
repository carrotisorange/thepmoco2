<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Str;
use App\Models\Property;
use Carbon\Carbon;
use Session;
use Illuminate\Validation\Rule;
use App\Models\Contract;

class BillPropertyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $property_uuid, $bill_count)
    {
        $attributes = request()->validate([
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'due_date' => 'nullable|date|after:start',
            'bill' => 'required|numeric|min:1'
        ]);

        $tenant_uuid = Contract::where('property_uuid', Session::get('property'))
          ->where('contracts.status','active')
          ->pluck('tenant_uuid');

        $bill_no = Property::find(Session::get('property'))->bills->max('bill_no')+1;

        try{
            for($i=0; $i<$bill_count; $i++){

                $unit_uuid = Contract::where('property_uuid', Session::get('property'))
                ->where('contracts.status','active')
                ->where('tenant_uuid', $tenant_uuid[$i])
                ->pluck('unit_uuid');

                  $attributes['unit_uuid']= $unit_uuid[0];
                  $attributes['tenant_uuid'] = $tenant_uuid[$i];
                  $attributes['bill_no'] = $bill_no++;
                  $attributes['reference_no'] = Carbon::now()->timestamp.''.$i;
                  $attributes['user_id'] = auth()->user()->id;
                  $attributes['property_uuid'] = Session::get('property');

                  Bill::create($attributes);
            }

             return back()->with('success', $i.' bills haven posted.');
        }catch(\Exception $e)
        {
            ddd($e);
        }
    }
}
