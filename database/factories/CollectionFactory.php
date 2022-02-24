<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\Bill;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Arr;

class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'collection'=> rand(10,1000),
             'tenant_uuid'=> Tenant::all()->random()->uuid,
             'room_uuid'=> Room::all()->random()->uuid,
             'property_uuid'=> Property::all()->random()->uuid,
             'owner_uuid'=> Owner::all()->random()->uuid,
             'collection_no' => $this->faker->unique()->numerify('###########'),
             'form' => Arr::random(['cash', 'bank', 'check', 'loan']),
             'user_id'=> User::all()->random()->id,
             'bill_id'=> Bill::all()->random()->id,
             'note' => $this->faker->paragraph(),
             'reason_for_deletion' => $this->faker->paragraph(),
        ];
    }
}
