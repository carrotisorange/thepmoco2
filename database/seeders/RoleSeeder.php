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
            'role' => 'billing'
         ]);

         Role::create([
            'role' => 'treasury'
         ]);

         Role::create([
         'role' => 'account payable'
         ]);
         
         Role::create([
         'role' => 'account owner'
         ]);

         Role::create([
         'role' => 'bookeeping'
         ]);

         Role::create([
            'role' => 'unit owner'
         ]);

         // Role::create([
         // 'role' => 'owner'
         // ]);

         //  Role::create([
         //  'role' => 'tenant'
         //  ]);


        // Role::create([
        //     'role' => 'dev'
        // ]);

       
        // Role::create([
        //     'role' => 'owner'
        // ]);
    }
}
