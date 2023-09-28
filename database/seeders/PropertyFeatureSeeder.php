<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyFeature;

class PropertyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyFeature::create([
            'property_type_id' => 8,
            'features' => '8,11,12,13,10,7'
        ]);
    }
}
