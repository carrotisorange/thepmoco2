<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\User;
use App\Models\Particular;
use App\Models\Property;
use App\Models\Unit;
use Session;
use Carbon\Carbon;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $bill_no = 1;

        static $reference_no = 1;

        return [
            'bill'=> rand(10,1000),
            'bill_no' => $bill_no++,
            'start' => now(),
            'end' => now()->addMonth(),
            'due_date' => now()->addDays(10),
            'penalty'=> rand(10,100),
            'reference_no' => Property::all()->random()->id.''.Carbon::now()->timestamp.''.$reference_no++,
            'tenant_uuid'=> Tenant::all()->random()->uuid,
            'user_id'=> User::all()->random()->id,
            'particular_id'=> Particular::all()->random()->id,
            'property_uuid'=> Property::all()->random()->uuid,
            'unit_uuid'=> Unit::all()->random()->uuid,
        ];
    }
}
