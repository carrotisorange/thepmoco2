<?php

namespace Database\Seeders;

use App\Models\ConcernSubcategory;
use Illuminate\Database\Seeder;

class ConcernSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConcernSubcategory::create([
            'category_id' => 4,
            'subcategory' => 'Electrical'
        ]);

        ConcernSubcategory::create([
            'category_id' => 4,
            'subcategory' => 'Plumbing'
        ]);

        ConcernSubcategory::create([
            'category_id' => 4,
            'subcategory' => 'Carpentry'
        ]);

        ConcernSubcategory::create([
            'category_id' => 4,
            'subcategory' => 'Repaint'
        ]);

    }
}
