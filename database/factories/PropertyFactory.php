<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Type;

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
        'type_id' => Type::all()->random()->id
       ];
    }
}
