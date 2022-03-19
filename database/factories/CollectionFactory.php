<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\Bill;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $ar_no = 1;

        return [
             'collection'=> rand(10,1000),
             'tenant_uuid'=> Tenant::all()->random()->uuid,
             'unit_uuid'=> Unit::all()->random()->uuid,
             'property_uuid'=> Property::all()->random()->uuid,
             'owner_uuid'=> Owner::all()->random()->uuid,
             'ar_no' => $ar_no++,
             'bill_reference_no' => Bill::all()->random()->reference_no,
             'form' => Arr::random(['cash', 'bank', 'check', 'loan']),
             'user_id'=> User::all()->random()->id,
             'bill_id'=> Bill::all()->random()->id,
             'note' => $this->faker->paragraph(),
             'reason_for_deletion' => $this->faker->paragraph(),
        ];
    }
}
