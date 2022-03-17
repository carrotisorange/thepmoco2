<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Tenant;

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
            'relationship' => Arr::random(['parent', 'sibling', 'friend', 'child']),
            'mobile_number' => $this->faker->unique()->numerify('###########'),
            'tenant_uuid' => Tenant::all()->random()->uuid
        ];
    }
}
