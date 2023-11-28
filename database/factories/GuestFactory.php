<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;

class GuestFactory extends Factory
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
            'guest' => $this->faker->name(),
            'unit_uuid' => '1604f647-ddf7-47ac-b366-6604f3d44937',
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_number' =>$this->faker->numerify('###########'),
            'status' => Arr::random(['reserved','checked-in', 'checked-out']),
            'movein_at' => now()->addDays([rand(1,2)]),
            'moveout_at' =>now()->addDays([rand(3,10)]),
            'property_uuid' => $propertyUuid,
            'price' => rand(1000,10000),
        ];
    }
}
