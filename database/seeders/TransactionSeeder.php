<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'user_id' => 1,
            'total_price' => 20000,
            'image' => 'invoice.jpg',
            'status' => 0
        ]);

        Transaction::create([
            'user_id' => 2,
            'total_price' => 10000,
            'image' => 'invoice.jpg',
            'status' => 1
        ]);
    }
}
