<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeedOfSale;

class DeedOfSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeedOfSale::factory(100)->create();
    }
}
