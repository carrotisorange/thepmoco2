<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropertyRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PropertyRole::factory(10)->create();
    }
}
