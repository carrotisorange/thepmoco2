<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contract::factory(100)->create();
        
    }
}
