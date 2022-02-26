<?php

namespace Database\Factories;
use App\Models\Particular;
use App\Models\Property;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyParticularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_uuid' => Property::all()->random()->uuid,
            'particular_id' => Particular::all()->random()->id,
            'minimum_charge' => rand(1,100),
            'due_date' => rand(1,31),
            'surcharge' => rand(1,100),
        ];
    }
}
