<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Eloquent\Model\PropertyBuilding;

class PropertyBuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PropertyBuilding::factory(10)->create();
    }
}
