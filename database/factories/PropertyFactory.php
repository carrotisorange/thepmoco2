<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Str;

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
        'uuid' => Str::uuid(),
        'property' => $this->faker->name(),
        'description' => $this->faker->paragraph(),
        'type_id' => rand(1,3),
       ];
    }
}
