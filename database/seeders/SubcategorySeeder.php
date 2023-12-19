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
        Subcategory::create([
            'subcategory_name' => 'Logo & Brand Identity',
            'category_id' => 1,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Art & Illustration',
            'category_id' => 1,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Website Development',
            'category_id' => 2,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Software Development',
            'category_id' => 2,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Search',
            'category_id' => 3,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Social',
            'category_id' => 3,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Editing & Post-Production',
            'category_id' => 4,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Animation',
            'category_id' => 4,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Content Writing',
            'category_id' => 5,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Career Writing',
            'category_id' => 5,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Music Production & Writing',
            'category_id' => 6,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Streaming & Audio',
            'category_id' => 6,
        ]);

        Subcategory::create([
            'subcategory_name' => 'General & Administrative',
            'category_id' => 7,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Business Management',
            'category_id' => 7,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Data Analysis',
            'category_id' => 8,
        ]);
        Subcategory::create([
            'subcategory_name' => 'Data Collection',
            'category_id' => 8,
        ]);

        Subcategory::create([
            'subcategory_name' => 'Products & Lifestyle',
            'category_id' => 9,
        ]);
        Subcategory::create([
            'subcategory_name' => 'People & Scenes',
            'category_id' => 9,
        ]);
    }
}
