<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->name(),
            'relationship' => 'parent',
            'mobile_number' => $this->faker->unique()->numerify('###########'),
            'tenant_uuid' => Str::random(8),
        ];
    }
}
