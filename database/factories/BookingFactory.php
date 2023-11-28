<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Guest;
use Illuminate\Support\Str;

class BookingFactory extends Factory
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
            'guest_uuid'=> Guest::where('property_uuid', $propertyUuid)->get()->random()->uuid,
            'property_uuid' => $propertyUuid,
            'status' => $this->faker->randomElement(['reserved', 'checked-in', 'checked-out', 'cancelled']),
            'movein_at' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'moveout_at' =>$this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'price' => rand(100,10000)
        ];
    }
}
