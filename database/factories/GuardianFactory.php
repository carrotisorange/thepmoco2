<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
            'name' => $this->faker->name(),
            'relationship' => Arr::random(['parent', 'sibling', 'friend', 'child']),
            'mobile_number' => $this->faker->unique()->numerify('###########'),
        ];
    }
}
