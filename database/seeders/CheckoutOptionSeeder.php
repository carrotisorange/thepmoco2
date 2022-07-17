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
            'option' => 'pay now',
            'policy' => 'Pay only 950 per month for 6 months.'
        ]);
        
        CheckoutOption::create([
            'option' => 'pay after 30 days',
            'policy' => 'You will only be charged after 30 days.'
        ]);
    }
}
