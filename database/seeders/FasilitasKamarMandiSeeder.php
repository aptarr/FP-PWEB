<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FasilitasKamarMandi;

class FasilitasKamarMandiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->count(5)->create();
        $fasilitas = ['Ember Mandi', 'Kloset Duduk', 'Shower', ];

        $i = 1;
        for ($id = 1; $id <= 150; $id++) {
            // Generate a random number between 1 and the length of $fasilitas
            $randNumber = rand(1, count($fasilitas));

            // Choose a random key from $fasilitas
            $randomKeys = array_rand($fasilitas, $randNumber);

            // If only one key is selected, convert it to an array
            if (!is_array($randomKeys)) {
                $randomKeys = [$randomKeys];
            }

            // Create a new FasilitasKamar record for the current id
            foreach ($randomKeys as $key) {
                $fasilitasItem = $fasilitas[$key];
                FasilitasKamarMandi::create([
                    'id' => $i++,
                    'fasilitas' => $fasilitasItem,
                    'service_id' => $id, // Set service_id to the current id
                ]);
            }
        }
    }
}
