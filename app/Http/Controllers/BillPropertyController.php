<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Str;
use App\Models\Property;
use Carbon\Carbon;
use Session;

class BillPropertyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($property_uuid, $bill_count)
    {
        $bill_count_min = Property::find($property_uuid)->bills->min('id');
        $bill_count_max = Property::find($property_uuid)->bills->max('id');

        $bill_no = Property::find(Session::get('property'))->bills->count()+1;

        for($i=$bill_count_min; $i>=$bill_count_max; $i++){

            $tenant = 

            Bill::create([
                'bill_no' => $bill_no++,
                'bill' => $this->rent,
                'reference_no' => Carbon::now()->timestamp.''.$bill_no,
                'start' => $this->start,
                'end' => Carbon::parse($this->start)->addMonth(),
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'status' => 'unpaid',
                'user_id' => auth()->user()->id,
                'particular_id' => '1',
                'property_uuid' => Session::get('property'),
                'unit_uuid' => $this->unit->uuid,
                'tenant_uuid' => $this->tenant->uuid,
        ]);
        }
    }
}
