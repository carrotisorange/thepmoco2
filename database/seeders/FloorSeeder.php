<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floors')->insert([
        'floor' => '1st floor'
        ]);

        DB::table('floors')->insert([
         'floor' => '2nd floor'
        ]);

        DB::table('floors')->insert([
         'floor' => '3rd floor'
        ]);

        DB::table('floors')->insert([
        'floor' => '4th floor'
        ]);

        DB::table('floors')->insert([
        'floor' => '5th floor'
        ]);

        DB::table('floors')->insert([
        'floor' => '6th floor'
        ]);
         
    }
}
