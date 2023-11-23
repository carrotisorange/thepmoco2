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
            // StatusSeeder::class,
            // CategorySeeder::class,
            // TypeSeeder::class,
            // RoleSeeder::class,
            //UserSeeder::class,
            //BuildingSeeder::class,
            // FloorSeeder::class,
            //PropertySeeder::class,
            //PropertyBuildingSeeder::class,
            //PropertySeeder::class,
            //UnitSeeder::class,
            //TenantSeeder::class,
            //RelationshipSeeder::class,
            //GuardianSeeder::class,
            //ReferenceSeeder::class,
            //BarangaySeeder::class,
            //CitySeeder::class,
            //ProvinceSeeder::class,
            //CountrySeeder::class,
            //OwnerSeeder::class,
            //RepresentativeSeeder::class,
            //BankSeeder::class,
            //UserPropertySeeder::class,
            //ContractSeeder::class,
            //ParticularSeeder::class,
            //PropertyParticularSeeder::class,
            //BillSeeder::class,
            //CollectionSeeder::class,
            //PropertyRoleSeeder::class,
            //ActionSeeder::class,

            ViolationSeeder::class
        ]);
    }
}
