<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tenant;
use App\Models\Relationship;

class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guardian' => $this->faker->name(),
            'relationship_id' => Relationship::all()->random()->id,
            'mobile_number' => $this->faker->unique()->numerify('###########'),
            'tenant_uuid' => Tenant::all()->random()->uuid
        ];
    }
}
