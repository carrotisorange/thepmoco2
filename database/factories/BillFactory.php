<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\User;
use App\Models\PropertyParticular;
use Illuminate\Support\Arr;
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
            'bill'=> rand(100,1000),
            'bill_no' => $bill_no++,
             'start' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
             'end' =>$this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'due_date' => now()->addDays(10),
            'penalty'=> rand(10,100),
            'user_id'=> User::all()->random()->id,
            'particular_id'=> PropertyParticular::where('property_uuid','337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->particular_id,
            'property_uuid' => '337f54e6-d6a4-4247-9b04-7626753e1825',
            'tenant_uuid'=> Tenant::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
            'unit_uuid'=> Unit::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
             'tenant_uuid'=> Tenant::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
            'owner_uuid'=> Owner::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
            'status' => Arr::random(['paid','unpaid']),
            'is_posted' => 1
        ];
    }
}
