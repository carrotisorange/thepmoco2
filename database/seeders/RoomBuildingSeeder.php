<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Eloquent\Model\RoomBuilding;

class RoomBuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RoomBuilding::factory(10)->create();
    }
}
