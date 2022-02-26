<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\Building;

class PropertyBuildingFactory extends Factory
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
            'building_id' => Building::all()->random()->id,
        ];
    }
}
