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
            'role' => 'admin',
            'description' => 'This user has access to dashboard, units, and tenants.',
         ]);

         Role::create([
            'role' => 'billing',
            'description' => 'This user has access to dashboard and bills.',
         ]);

         Role::create([
            'role' => 'treasury',
            'description' => 'This user has access to dashboard and collections.',
         ]);

         Role::create([
         'role' => 'account payable',
         'description' => 'This user has access to dashboard and expenses.',
         ]);
         
         Role::create([
         'role' => 'account owner',
        'description' => 'This user has access to all features.',
         ]);

         Role::create([
         'role' => 'bookeeping',
         'description' => 'This user has access to dashboard and books.',
         ]);

         Role::create([
            'role' => 'unit owner',
            'description' => 'This user has access to units.',
         ]);

         Role::create([
           'role' => 'tenant',
           'description' => 'This user has access to his contracts.',
           ]);

         Role::create([
            'role' => 'manager',
            'description' => 'This user has access to all features.',
         ]);

    }
}
