<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Lampu',
            'description' => 'Ini adalah lampu untuk rumah',
            'price' => 10000,
            'stock' => 12
        ]);

        Product::create([
            'name' => 'Stopkontak',
            'description' => 'Ini adalah stopkontak untuk rumah',
            'price' => 5000,
            'stock' => 19
        ]);
    }
}
