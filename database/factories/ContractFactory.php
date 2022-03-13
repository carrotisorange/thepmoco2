<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;

class ContractFactory extends Factory
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
             'unit_uuid'=> Unit::all()->random()->uuid,
             'user_id'=> User::all()->random()->id,
             'tenant_uuid'=> Tenant::all()->random()->uuid,
             'start' => now(),
             'end' =>now()->addMonth([rand(1,10)]),
             'rent' => rand(1000,10000),
             'status' => Arr::random(['active','pending', 'inactive']),
             'interaction' => Arr::random(['facebook','walk-in', 'referral']),
             'moveout_reason' => Arr::random(['delinquent','end of contract', 'force majeure']),
             'discount' => rand(100,1000)
        ];
    }
}
