<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CheckoutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details'); // variable data akan dikirim ke dalam tabke transaksi
        // menambahkan uuid pada transaksi sebagai identifier
        $data['uuid'] = 'TRX'.mt_rand(10000,99999).mt_rand(100,999); 

        $transaction = Transaction::create($data); // menambah data transaksi

        // melooping transaction detail untuk mengetahui apa saja yang dibeli oleh user
        // juga untuk membuat array untuk memasukan transaction detail
        foreach ($request->transaction_details as $product) {
            # code...
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            Product::find($product)->decrement('quantity');
        }
        // membuat pengureangan pada stok barang
        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
