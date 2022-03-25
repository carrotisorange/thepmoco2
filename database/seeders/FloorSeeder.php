<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Floor;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Floor::create([
         'floor' => 'NA'
        ]);

        Floor::create([
        'floor' => '1st floor'
        ]);

        Floor::create([
         'floor' => '2nd floor'
        ]);

        Floor::create([
         'floor' => '3rd floor'
        ]);

        Floor::create([
        'floor' => '4th floor'
        ]);

        Floor::create([
        'floor' => '5th floor'
        ]);

        Floor::create([
        'floor' => '6th floor'
        ]);
         
    }
}
