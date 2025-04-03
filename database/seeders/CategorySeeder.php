<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();

        Category::create(['name' => 'Horror']);
        Category::create(['name' => 'Western']);
        Category::create(['name' => 'Family Friendly']);
        Category::create(['name' => 'Solitaire']);
        Category::create(['name' => 'With Friends']);
    }
}
