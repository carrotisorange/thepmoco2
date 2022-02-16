<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status' => 'vacant'
        ]);

        DB::table('statuses')->insert([
            'status' => 'occupied'
        ]);

        DB::table('statuses')->insert([
            'status' => 'dirty'
        ]);

        DB::table('statuses')->insert([
            'status' => 'reserved'
        ]);

        DB::table('statuses')->insert([
        'status' => 'vacant'
        ]);

        DB::table('statuses')->insert([
        'status' => 'blocked'
        ]);
    }
}
