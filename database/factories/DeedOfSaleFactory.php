<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\{Unit, Owner};

class DeedOfSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $propertyUuid = 'b9771339-f8b1-4fcf-bca6-cc00087929b0';

        return [
            'uuid' => Str::uuid(),
            'unit_uuid'=> Unit::where('property_uuid', $propertyUuid)->get()->random()->uuid,
            'owner_uuid'=> Owner::where('property_uuid', $propertyUuid)->get()->random()->uuid,
            'property_uuid' => $propertyUuid
        ];
    }
}
