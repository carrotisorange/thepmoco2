<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            'role' => 'admin'
         ]);

         DB::table('roles')->insert([
            'role' => 'biller'
         ]);

         DB::table('roles')->insert([
            'role' => 'collector'
         ]);

        DB::table('roles')->insert([
            'role' => 'dev'
        ]);

        DB::table('roles')->insert([
            'role' => 'manager'
        ]);

        DB::table('roles')->insert([
            'role' => 'owner'
        ]);
    }
}
