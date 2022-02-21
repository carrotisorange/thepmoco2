<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => 'vacant'
        ]);

        Status::create([
            'status' => 'occupied'
        ]);

        Status::create([
            'status' => 'dirty'
        ]);

        Status::create([
            'status' => 'reserved'
        ]);

        Status::create([
        'status' => 'blocked'
        ]);

        Status::create([
        'status' => 'pending'
        ]);
    }
}
