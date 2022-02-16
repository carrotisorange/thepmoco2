<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        'type' => 'Condominium Association',
        'description' => 'Condominium Association'
        ]);

        DB::table('types')->insert([
        'type' => 'Apartment Rentals',
         'description' => 'Condominium Association'
        ]);

        DB::table('types')->insert([
         'type' => 'Student Dormitory',
          'description' => 'Condominium Association'
         ]);
    }
}
