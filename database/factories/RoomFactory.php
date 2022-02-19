<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Property;
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
        'status_id' => rand(1,5),
        'category_id' => rand(1,2),
        'building_id'=>rand(1,3),
        'floor_id' => rand(1,6),
        'property_uuid' => rand(1,10),
        'user_id' => rand(1,10),
        'slug' => Str::random(10)
       ];
    }
}
