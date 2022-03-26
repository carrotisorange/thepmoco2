<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Particular;

class ParticularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Particular::create([
        'particular' => 'Rent',
        ]);

        Particular::create([
         'particular' => 'Advance Rent',
        ]);

        Particular::create([
         'particular' => 'Security Deposit (Rent)',
        ]);

        Particular::create([
          'particular' => 'Security Deposit (Utilities)',
        ]);

        Particular::create([
         'particular' => 'Water',
        ]);

        Particular::create([
         'particular' => 'Electric',
        ]);

        Particular::create([
         'particular' => 'Surcharge',
        ]);
    }
}
