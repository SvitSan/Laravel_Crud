<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'People',
            'description' => 'Human resources and services',
        ]);
        
        Category::create([
            'name' => 'Animals',
            'description' => 'Pets and animal supplies',
        ]);
        

        Category::create([
            'name' => 'Fruit',
            'description' => 'Fresh fruits and vegetables',
        ]);
    }
}
