<?php

namespace Database\Seeders;

use App\Models\Reference;
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
            StatusSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            BuildingSeeder::class,
            FloorSeeder::class,
            PropertySeeder::class,
            RoomBuildingSeeder::class,
            PropertySeeder::class,
            RoomSeeder::class,
            GuardianSeeder::class,
            ReferenceSeeder::class,
            TenantSeeder::class,  
        ]);
    }
}
