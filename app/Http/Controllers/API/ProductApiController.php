<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
// pada controller panggil kelas responseformatter karena jika tidak maka akan memunculkan error 404 pada fungsi ResponseFormatter dibawah
use App\Http\Controllers\API\ResponseFormatter;

class ProductApiController extends Controller
{
    // membuat fungsi all untuk bisa mengambil semua data dalam product
    public function all(Request $request)
    {
        // memanggil data berdasarkan id
        $id = $request->input('id');
        // memanggil data dengan limit tertentu
        $limit = $request->input('limit', 6);
        // mencari data berdasarkan nama
        $name = $request->input('name');
        // memanggil data berdasarkan slug
        $slug = $request->input('slug');
        // memanggil data berdasarkan type
        $type = $request->input('type');
        // memanggil data berdasarkan harga awal
        $price_from = $request->input('price_from');
        // memanggil data berdasarkan harga akhir
        $price_to = $request->input('price_to');

        if ($id) {
            # code...
            $product = Product::with('galleries')->find($id);

            if ($product) {
                # code...
                return ResponseFormatter::success($product, 'data product berhasil diambil');
            }else{
                return ResponseFormatter::error(null, 'data tidak ditemukan', 404);
            }
        }

        // mengambil data berdasarkan slug
        if ($slug) {
            # code...
            $product = Product::with('galleries')->where('slug', $slug)->first();

            if ($product) {
                # code...
                return ResponseFormatter::success($product, 'data product berhasil diambil');
            }else{
                return ResponseFormatter::error(null, 'data tidak ditemukan', 404);
            }
        }

        $product = Product::with('galleries');

        if ($name) {
            # code...
            $product->where('name', 'like', '%' . $name . '%');
        }

        if ($type) {
            # code...
            $product->where('type', 'like', '%' . $type . '%');
        }

        if ($price_from) {
            # code...
            $product->where('price', '>=', $price_from);
        }
        if ($price_to) {
            # code...
            $product->where('price', '<=', $price_to);
        }
    
        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data List Product Berhasil Diambil'
        );


    }
}
