<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionDetailRequest;
use App\Http\Requests\UpdateTransactionDetailRequest;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TransactionDetailController extends Controller
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
            'data' => TransactionDetail::all()
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionDetailRequest $request)
    {
        TransactionDetail::create($request->all());

        Product::find($request->product_id)->update([
            'stock' => DB::raw('stock-1'),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil tambah data transaksi detail',
            'data' => $request->all()
        ], Response::HTTP_CREATED);
    }
}
