<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
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
            'data' => Transaction::all()
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
        Transaction::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil tambah data transaksi',
            'data' => $request->all()
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
