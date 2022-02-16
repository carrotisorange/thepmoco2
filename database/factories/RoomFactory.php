<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
        'room' => $this->faker->name(),
        'price' => $this->faker->randomDigit(),
        'status_id' => 1,
        'category_id' => 1,
        'building_id' => 1,
        'floor_id' => 1,
        'property_id' => 1,
        'user_id' => 1,
       ];
    }
}
