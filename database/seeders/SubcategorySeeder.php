<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Subcategory::factory()->count(50)->create();
        $categories = ['Jakarta', 'Bogor', 'Surabaya', 'Bekasi', 'Yogyakarta', 'Semarang', 'Depok', 'Bandung', 'Tangerang'];

        foreach ($categories as $categoryName) {
            Subcategory::create(['subcategory_name' => $categoryName]);
        }
    }
}
