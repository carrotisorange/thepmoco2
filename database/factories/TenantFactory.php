<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class TenantFactory extends Factory
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
            'tenant' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_number' => $this->faker->unique()->numerify('###########'),
            'birthdate' =>$this->faker->date(),
            'civil_status' => Arr::random(['single', 'married', 'widowed', 'divorced']),
            'reference_id' => rand(1,10),
            'guardian_id' => rand(1,10),
            'gender' => Arr::random(['male','female']),
            'type' => Arr::random(['working','studying']),
            'barangay_id' => rand(1,1000),
            'city_id' => rand(1,135),
            'province_id' => rand(1,80),
            'country_id' => rand(1,17)
        ];
    }
}
