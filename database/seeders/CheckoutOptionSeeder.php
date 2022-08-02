<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CheckoutOption;

class CheckoutOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckoutOption::create([
            'option' => 'trial',
            'policy' => 'all features available for 30 days',
            'discount' => '0.00'
        ]);
        
        CheckoutOption::create([
            'option' => '1 month',
            'policy' => 'all features available',
            'discount' => '0.00'
        ]);

        CheckoutOption::create([
            'option' => '3 months',
            'policy' => 'all features available',
            'discount' => '0.10'
        ]);

        CheckoutOption::create([
            'option' => '6 months',
            'policy' => 'all features available',
            'discount' => '0.20'
        ]);

        CheckoutOption::create([
            'option' => '1 year',
            'policy' => 'all features available',
            'discount' => '0.30'
        ]);
    }
}
