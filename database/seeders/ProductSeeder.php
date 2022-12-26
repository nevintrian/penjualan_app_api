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
            'name' => 'Nasi Goreng',
            'description' => 'Ini adalah nasi goreng',
            'price' => 10000,
            'stock' => 12
        ]);

        Product::create([
            'name' => 'Teh',
            'description' => 'Ini adalah teh',
            'price' => 5000,
            'stock' => 19
        ]);
    }
}
