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

class RoomFactory extends Factory
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
        'room' => $this->faker->name(),
        'price' => $this->faker->randomDigit(),
        'status_id' => Status::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'building_id'=>Building::all()->random()->id,
        'floor_id' => Floor::all()->random()->id,
        'batch_no' => Str::random(),
        'property_uuid' => Property::all()->random()->uuid,
        'user_id' => User::all()->random()->id,
       ];
    }
}
