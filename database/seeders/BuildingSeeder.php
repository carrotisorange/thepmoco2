<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('buildings')->insert([
         'building' => 'Harvard'
         ]);

         DB::table('buildings')->insert([
         'building' => 'Princeton'
         ]);

         DB::table('buildings')->insert([
         'building' => 'Wharton'
         ]);
    }
}
