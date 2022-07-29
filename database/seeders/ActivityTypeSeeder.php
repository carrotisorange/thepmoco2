<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityType;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityType::create([
            'activity_type' => 'property'
        ]);

        ActivityType::create([
          'activity_type' => 'unit'
        ]);

        ActivityType::create([
            'activity_type' => 'tenant'
        ]);

        ActivityType::create([
            'activity_type' => 'owner'
        ]);

        ActivityType::create([
            'activity_type' => 'contract'
        ]);

        ActivityType::create([
            'activity_type' => 'deed_of_sale'
        ]);

        ActivityType::create([
            'activity_type' => 'enrollee'
        ]);

        ActivityType::create([
            'activity_type' => 'user'
        ]);

        ActivityType::create([
            'activity_type' => 'particular'
        ]);

        ActivityType::create([
            'activity_type' => 'bill'
        ]);

        ActivityType::create([
            'activity_type' => 'collection'
        ]);

        ActivityType::create([
            'activity_type' => 'timestamp'
        ]);

        ActivityType::create([
            'activity_type' => 'concern'
        ]);
    }
}
