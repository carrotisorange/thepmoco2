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

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bill'=> rand(10,1000),
            'bill_no' => $this->faker->unique()->numerify('###########'),
            'start' => now(),
            'end' => now()->addMonth(),
            'due_date' => now()->addDays(10),
            'penalty'=> rand(10,100),
            'tenant_uuid'=> Tenant::all()->random()->uuid,
            'user_id'=> User::all()->random()->id,
            'particular_id'=> Particular::all()->random()->id,
            'property_uuid'=> Property::all()->random()->uuid,
            'unit_uuid'=> Unit::all()->random()->uuid,
        ];
    }
}
