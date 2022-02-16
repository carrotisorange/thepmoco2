<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\User;

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
        'type_id' => rand(1,3),
        'user_id' => rand(1,10),
       ];
    }
}
