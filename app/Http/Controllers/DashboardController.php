<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // menjumlahkan jumlah total transaksi berdasarkan pembelian dengan status sukses
        $data['income'] = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        // Mentotalkan data transaksi
        $data['sales'] = Transaction::count();
        // menampilkan data transaksi dengan berdasarkan id dan diurutkan dari yang terbesar kemudian diambil 5
        $data['items'] = Transaction::orderBy('id', 'DESC')->take(5)->get();

        $data['pie'] = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count()
        ];

        return view('pages.dashboard', $data);
    }
}
