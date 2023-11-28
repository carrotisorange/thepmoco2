<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class OwnerFactory extends Factory
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
        'owner' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail(),
        'mobile_number' => $this->faker->unique()->numerify('###########'),
        'birthdate' =>$this->faker->date(),
        'civil_status' => Arr::random(['single', 'married', 'widowed', 'divorced']),
        'gender' => Arr::random(['male','female']),
        'bank_id' => rand(1,10),
        'occupation' => $this->faker->word,

        'barangay' => $this->faker->city,
        'city_id' => rand(1,135),
        'province_id' => rand(1,80),
        'country_id' => rand(1,17),
        'property_uuid' => $propertyUuid,
        'occupation' => $this->faker->word(),
        'employer' => $this->faker->word(),
        'employer_address' => $this->faker->word(),
        ];
    }
}
