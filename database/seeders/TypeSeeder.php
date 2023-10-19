<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
        'type' => 'Condominium Association',
        'description' => 'Condominium Association',
        'features' => '1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,24',
        'landing_page_feature_id' => 3,
        'icon' => 'condominium.png',
        'unit_type_id' => 1,
        'stepper' => '1,6,2,5'
        ]);

        Type::create([
        'type' => 'Residential Property',
        'description' => 'Residential Property',
        'features' => '1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,24',
        'landing_page_feature_id' => 3,
        'icon' => 'condominium.png',
        'unit_type_id' => 1,
        'stepper' => '1,6,2,5'
        ]);

    }
}
