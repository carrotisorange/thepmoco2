<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
        'Philippines',
        'Japan',
        'China',
        'Indonesia',
        'India',
        'Thailand',
        'South Korea',
        'Vietnam',
        'Singapore',
        'Malaysia',
        'Hong Kong',
        'Qatar',
        'Iran',
        'Saudi Arabia',
        'Pakistan',
        'Taiwan',
        'Israel'
        ];

        foreach($countries as $country){
        \App\Models\Country::factory()->create([
        'country' => $country
        ]);
        }   
    }
}
