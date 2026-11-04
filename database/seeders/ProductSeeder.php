<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [[
            'category_id' => 1,
            'image' => null,
            'name' => 'Kartu Nama',
            'stock' => 10,
            'price' => 85000,
        ],
        [
            'category_id' => 2,
            'image' => null,
            'name' => 'Brosur',
            'stock' => 10,
            'price' => 100000,
        ], [
            'category_id' => 3,
            'image' => null,
            'name' => 'Undangan',
            'stock' => 10,
            'price' => 150000,
        ]];

        foreach ($products as $value) {
            \App\Models\Product::create([
                'category_id' => $value['category_id'],
                'image' => $value['image'],
                'name' => $value['name'],
                'stock' => $value['stock'],
                'price' => $value['price'],
            ]);
        }
    }
}
