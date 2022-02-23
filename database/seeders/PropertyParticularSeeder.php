<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropertyParticularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PropertyParticular::factory(10)->create();
    }
}
