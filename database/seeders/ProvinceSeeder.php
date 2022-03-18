<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $provinces = [
         'Ilocos Norte',
         'La Union',
         'Pangasinan',
         'Batanes',
         'Cagayan',
         'Isabela',
         'Nueva Vizcaya',
         'Quirino',
         'Aurora',
         'Bataan',
         'Bulacan',
         'Pampanga',
         'Tarlac',
         'Zambales',
         'Nueva Ecija',
         'Cavite',
         'Laguna',
         'Batangas',
         'Rizal',
         'Quezon',
         'Occidental Mindoro',
         'Oriental Mindoro',
         'Marinduque',
         'Romblon',
         'Palawan',
         'Camarines Norte',
         'Camarines Sur',
         'Catanduanes',
         'Masbate',
         'Sorsogon',
         'Albay',
         'Aklan',
         'Antique',
         'Guimaras',
         'Capiz',
         'Iloilo',
         'Bohol',
         'Cebu',
         'Siquijor',
         'Negros Oriental',
         'Negros Occidental',
         'Biliran',
         'Leyte',
         'Northern Samar',
         'Samar',
         'Southern Leyte',
         'Eastern Samar',
         'Zamboanga Del Norte',
         'Zamboanga Del Sur',
         'Zamboanga del Sur',
         'Camiguin',
         'Bukidnon',
         'Lanao Del Norte',
         'Misamis Oriental',
         'Misamis Occidental',
         'Compostella Valley',
         'Davao del Norte',
         'Davao del Sur',
         'Davao Oriental',
         'Davao Occidental',
         'South Cotabato',
         'Cotabato',
         'Sultan Kudarat',
         'Sarangani',
         'Agusan del Sur',
         'Agusan del Norte',
         'Surigao del Sur',
         'Surigao del Norte',
         'Dinagat Islands',
         'Apayao',
         'Abra',
         'Benguet',
         'Ifugao',
         'Kalinga',
         'Mountain Province',
         'Basilan',
         'Lanao del Sur',
         'Maguindanao',
         'Sulu',
         'Tawi-Tawi'
         ];

         foreach($provinces as $province){
         \App\Models\Province::factory()->create([
         'country_id' => '1',
         'province' => $province
         ]);
         }
    }
}
