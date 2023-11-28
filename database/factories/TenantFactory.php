<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Property;

class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $propertyUuid = '337f54e6-d6a4-4247-9b04-7626753e1825';

        return [
            'uuid' => Str::uuid(),
            'tenant' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_number' => $this->faker->unique()->numerify('###########'),
            'birthdate' =>$this->faker->date(),
            'civil_status' => Arr::random(['single', 'married', 'widowed', 'divorced']),
            'gender' => Arr::random(['male','female']),
            'status' => 'active',
            'type' => Arr::random(['working','studying']),
            'property_uuid' => $propertyUuid,
            'barangay' => Str::random(10).' city',
            'city_id' => rand(1,135),
            'province_id' => rand(1,80),
            'country_id' => rand(1,17)
    ];
    }
}
