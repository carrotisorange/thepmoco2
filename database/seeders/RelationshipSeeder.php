<?php

namespace Database\Seeders;
use App\Models\Relationship;

use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relationship::create([
            'relationship' => 'mother'
        ]);

        Relationship::create([
        'relationship' => 'father'
        ]);

        Relationship::create([
        'relationship' => 'child'
        ]);

        Relationship::create([
        'relationship' => 'friend'
        ]);

        Relationship::create([
        'relationship' => 'relative'
        ]);

        Relationship::create([
        'relationship' => 'sibling'
        ]);

        Relationship::create([
        'relationship' => 'spouse'
        ]);

        Relationship::create([
        'relationship' => 'friend'
        ]);

        Relationship::create([
        'relationship' => 'others'
        ]);
    }
}
