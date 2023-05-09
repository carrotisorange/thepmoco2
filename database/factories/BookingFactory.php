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
        return [
            'uuid' => Str::uuid(),
            'unit_uuid' => Unit::all()->random()->uuid,
            'guest_uuid' => Guest::all()->random()->uuid,
            'property_uuid' => 'f553a604-3481-4fea-8fde-8e6a8425dcc3',
            'status' => $this->faker->randomElement(['reserved', 'checked-in', 'checked-out', 'cancelled']),
            'movein_at' => Carbon::now(),
            'movein_at' => Carbon::now()->addDay(rand(1,10)),
            'price' => rand(0,100000)
        ];
    }
}
