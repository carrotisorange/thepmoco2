<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_number' => $this->faker->unique()->numerify('###########'),
            'birthdate' =>$this->faker->date(),
            'civil_status' => 'single',
            'reference_id' => rand(1,10),
            'guardian_id' => rand(1,10),
            'gender' => 'male',
            'type' => 'student',
            'barangay_id' => rand(1,1000),
            'city_id' => rand(1,135),
            'province_id' => rand(1,80),
            'country_id' => rand(1,17)
        ];
    }
}
