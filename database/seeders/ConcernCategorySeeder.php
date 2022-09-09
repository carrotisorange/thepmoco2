<?php

namespace Database\Seeders;

use App\Models\ConcernCategory;
use Illuminate\Database\Seeder;

class ConcernCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConcernCategory::create([
            'category' => 'Billing'
        ]);

        ConcernCategory::create([
            'category' => 'Payment'
        ]);
        
        ConcernCategory::create([
          'category' => 'Contract'
        ]);

        ConcernCategory::create([
            'category' => 'Maintenance'
        ]);

        ConcernCategory::create([
            'category' => 'Housekeeping'
        ]);

        ConcernCategory::create([
            'category' => 'Others'
        ]);
    }
}
