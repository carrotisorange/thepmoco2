<?php

namespace Database\Seeders;
use App\Models\Action;

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::create([
            'action' => 'tenant contract',
        ]);

        Action::create([
            'action' => 'unit enrollment',
        ]);
    }
}
