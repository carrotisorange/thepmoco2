<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'feature' => 'Contract Feature',
            'price' => 300,
        ]);
        
        Feature::create([
            'feature' => 'Concern Feature',
            'price' => 300,
        ]);

        Feature::create([
            'feature' => 'Tenant Portal Feature',
            'price' => 600,
        ]);

        Feature::create([
            'feature' => 'Owner Portal Feature',
            'price' => 600,
        ]);

        Feature::create([
          'feature' => 'Account Payables Feature',
          'price' => 300,
        ]);

        Feature::create([
            'feature' => 'Account Receivables Feature',
            'price' => 600,
        ]);

        Feature::create([
            'feature' => 'Portfolio Dashboard Feature',
            'price' => 600,
        ]);
    }
}
