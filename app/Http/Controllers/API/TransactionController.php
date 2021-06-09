<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with('details.product')->find($id);

        if ($product) {
            # code...
            return ResponseFormatter::success($product, 'Data Transaksi Berhasil Diambil');
        }else{
            return ResponseFormatter::success(null, 'Data tidak ditemukan', 404);
        }

    }
}
