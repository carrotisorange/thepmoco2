<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Guardian::factory(10)->create();
    }
}
