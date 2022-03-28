<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Relationship;
use App\Models\Owner;

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
            'relationship_id' => Relationship::all()->random()->id,
            'mobile_number' => $this->faker->numerify('###########'),
            'owner_uuid' => Owner::all()->random()->uuid

        ];
    }
}
