<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionDetail::create([
            'transaction_id' => 1,
            'product_id' => 2,
            'quantity' => 2,
            'subtotal' => 10000
        ]);

        TransactionDetail::create([
            'transaction_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'subtotal' => 10000
        ]);
    }
}
