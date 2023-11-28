<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guest::factory(100)->create();
    }
}
