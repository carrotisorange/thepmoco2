<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Session;
use App\Models\{Tenant,Unit, User,Interaction};

class ContractFactory extends Factory
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
            'unit_uuid'=> Unit::where('property_uuid', $propertyUuid)->get()->random()->uuid,
            'user_id'=> User::all()->random()->id,
            'tenant_uuid'=> Tenant::where('property_uuid', $propertyUuid)->get()->random()->uuid,
            'property_uuid' => $propertyUuid,
            'start' => $this->faker->dateTimeThisDecade($max = 'now', $timezone = null),
            'end' =>$this->faker->dateTimeThisDecade($max = 'now', $timezone = null),
            'rent' => Unit::where('property_uuid', $propertyUuid)->get()->random()->rent,
            'status' => Arr::random(['active','pending', 'inactive']),
            'interaction_id' => Interaction::all()->random()->id,
            'moveout_reason' => Arr::random(['','delinquent','end of contract', 'force majeure']),
            'discount' => rand(100,1000)
        ];
    }
}
