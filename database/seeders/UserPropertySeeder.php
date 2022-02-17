<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserProperty::factory(10)->create();
    }
}
