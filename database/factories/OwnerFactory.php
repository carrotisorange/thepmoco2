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
        return [
        'uuid' => Str::uuid(),
        'owner' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail(),
        'mobile_number' => $this->faker->unique()->numerify('###########'),
        'birthdate' =>$this->faker->date(),
        'civil_status' => Arr::random(['single', 'married', 'widowed', 'divorced']),
        'gender' => Arr::random(['male','female']),
        'representative_id' => rand(1,10),
        'bank_id' => rand(1,10),
        'occupation' => $this->faker->word,

        'barangay_id' => rand(1,1000),
        'city_id' => rand(1,135),
        'province_id' => rand(1,80),
        'country_id' => rand(1,17),

        'occupation' => $this->faker->word(),
        'employer' => $this->faker->word(),
        'employer_address' => $this->faker->word(),
        ];
    }
}
