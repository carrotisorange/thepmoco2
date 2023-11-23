<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ViolationTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->name,
            'description' => $this->faker->sentence
        ];
    }
}
