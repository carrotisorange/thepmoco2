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
            'type' => 'student'
        ];
    }
}
