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
        'description' => 'Condominium Association'
        ]);

        Type::create([
        'type' => 'Apartment Rentals',
         'description' => 'Condominium Association'
        ]);

        Type::create([
         'type' => 'Student Dormitory',
         'description' => 'Condominium Association'
         ]);
    }
}
