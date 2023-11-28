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
            'collection'=> Bill::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->where('status', 'paid')->posted()->get()->random()->bill,
            'tenant_uuid'=> Tenant::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
            'unit_uuid'=> Unit::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
            'owner_uuid'=> Owner::where('property_uuid', '337f54e6-d6a4-4247-9b04-7626753e1825')->get()->random()->uuid,
            'property_uuid' => '337f54e6-d6a4-4247-9b04-7626753e1825',
            'ar_no' => $ar_no++,
            'form' => Arr::random(['cash', 'bank', 'cheque']),
            'user_id'=> User::all()->random()->id,
            'bill_id'=> Bill::all()->random()->id,
            'note' => $this->faker->paragraph(),
            'is_posted' => 1,
             'created_at' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
        ];
    }
}
