<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            BuildingSeeder::class,
            FloorSeeder::class,
            PropertySeeder::class,
            RoomBuildingSeeder::class,
            StatusSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            PropertySeeder::class,
            RoomSeeder::class
        ]);
    }
}
