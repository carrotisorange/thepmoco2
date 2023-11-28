<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Owner::factory(100)->create();
    }
}
