<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id'=>1,
            'name'=> 'Mr.Khim',
            'price'=> 35.5,
            'is_active'=> true,
            'stock'=> 23
        ]);
        Product::create([
            'category_id'=>2,
            'name'=> 'Cat Food',
            'price'=> 1.5,
            'is_active'=> true,
            'stock'=> 100
        ]);

        Product::create([
            'category_id'=>3,
            'name'=> 'Apple',
            'price'=> 0.5,
            'is_active'=> true,
            'stock'=> 200
        ]);
    }
}
