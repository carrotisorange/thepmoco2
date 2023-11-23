<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\{Property,UserProperty,Tenant,Owner,Type,Unit};

class ViolationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $count = 1;

       return [
            'reference_no'=> $count++.''.Str::random(),
            'property_uuid' => Property::all()->random()->uuid,
            'tenant_uuid' => Tenant::all()->random()->uuid,
            'owner_uuid' => Owner::all()->random()->uuid,
            'unit_uuid' => Unit::all()->random()->uuid,
            'type_id'=> Type::all()->random()->id,
            'violation' => $this->faker->title(),
            'details'=> $this->faker->sentence(),
            'image'=> null,
            'is_billed'=> rand(0,1),
            'user_id'=> UserProperty::all()->random()->user_id,
        ];
    }
}
