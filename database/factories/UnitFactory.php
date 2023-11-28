<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Property;
use App\Models\Building;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UnitFactory extends Factory
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
        'unit' => $this->faker->unique()->secondaryAddress(),
        'rent' => rand(1000,20000),
        'status_id' => Status::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'building_id'=>Building::all()->random()->id,
        'floor_id' => Floor::all()->random()->id,
        'batch_no' => Str::random(),
        'property_uuid' => $propertyUuid,
        'user_id' => '1102',
        'is_enrolled' => rand(1,0),
        'rent' => rand(0,100),
        'occupancy' => rand(1,5),
        'is_the_unit_for_rent_to_tenant' => rand(0,1),
        'rent_type' => Arr::random(['rent_per_unit', 'rent_per_tenant']),
        'transient_rent' => rand(500,2000),
        'rent_duration' => Arr::random(['long_term', 'short_term', 'daily']),
        'marketing_fee' => rand(100,1000),
        'management_fee' => rand(100,1000),
       ];
    }
}
