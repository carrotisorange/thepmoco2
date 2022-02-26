<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create([
            'role' => 'admin'
         ]);

         Role::create([
            'role' => 'biller'
         ]);

         Role::create([
            'role' => 'collector'
         ]);

        // Role::create([
        //     'role' => 'dev'
        // ]);

        Role::create([
            'role' => 'manager'
        ]);

        // Role::create([
        //     'role' => 'owner'
        // ]);
    }
}
