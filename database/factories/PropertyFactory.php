<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
        'property' => $this->faker->name(),
        'description' => $this->faker->paragraph(),
        'type_id' => 1,
        'user_id' => 1
       ];
    }
}
