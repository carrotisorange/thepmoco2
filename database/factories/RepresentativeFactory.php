<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RepresentativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'representative' => $this->faker->name,
            'relationship' => Arr::random(['parent', 'sibling', 'friend', 'child']),
            'email' => $this->faker->safeEmail(),
            'mobile_number' => $this->faker->numerify('###########')

        ];
    }
}
