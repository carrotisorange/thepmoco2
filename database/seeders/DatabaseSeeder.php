<?php

namespace Database\Seeders;

use App\Models\Reference;
use App\Models\Representative;
use App\Models\UserProperty;
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
            BarangaySeeder::class,
            CitySeeder::class,
            ProvinceSeeder::class,
            CountrySeeder::class,
            OwnerSeeder::class,
            RepresentativeSeeder::class,
            BankSeeder::class,
            UserPropertySeeder::class,
            ContractSeeder::class
        ]);
    }
}
