<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Property;

class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'agent' => $this->faker->name(),
            'is_active' => Arr::random(['1', '0']),
            'property_uuid' => Property::all()->random()->uuid,
            'referral_code' => Str::random(10),
            'email' => $this->faker->unique()->word().'@gmail.com',
            'mobile_number' =>$this->faker->numerify('###########'),
          
           
        ];
    }
}
