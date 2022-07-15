<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'plan' => 'basic',
            'external_id' => 'basic-plan-for-950',
            'price'=> '950',
            'description' => '1-20 units.',
            'plan_expires_after' => 30,
        ]);

        Plan::create([
            'plan' => 'advanced',
            'external_id' => 'advanced-plan-for-1800',
            'price'=> '1800',
            'description' => '21-50 units.',
            'plan_expires_after' => 30,
        ]);

        Plan::create([
            'plan' => 'premium',
            'external_id' => 'premium-plan-for-2400',
            'price'=> '2400',
            'description' => '51-100 units.',
            'plan_expires_after' => 30,
         ]);
    }
}
