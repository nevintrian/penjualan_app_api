<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Response;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Transaction::with('transaction_detail')->get()
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $image_path = $request->file('image')->store('image', 'public');
        $items = json_decode($request->items);

        $total_price = 0;
        $product_array = [];
        $subtotal_array = [];
        $quantity_array = [];

        foreach ($items as $item) {
            $price = Product::find($item->product_id)->price;
            $subtotal = $price * $item->quantity;
            $total_price += $subtotal;
            array_push($subtotal_array, $subtotal);
            array_push($product_array, $item->product_id);
            array_push($quantity_array, $item->quantity);
        }

        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'total_price' => $total_price,
            'image' => "storage/" . $image_path,
            'status' => $request->status
        ]);

        foreach ($product_array as $key => $value) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $value,
                'quantity' => $quantity_array[$key],
                'subtotal' => $subtotal_array[$key]
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil tambah data transaksi',
            'data' => $transaction
        ], Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        Transaction::find($transaction->id)->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil ubah data transaksi',
            'data' => $request->all()
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::find($transaction->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil hapus data transaksi',
        ], Response::HTTP_OK);
    }
}
