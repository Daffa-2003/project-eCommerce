<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ADMIN
    public function index()
    {
        $product = product::all()->sum('quantity');
        $user = User::where(['role' => '1'])->count();
        $totalTransaksi = transaksi::all()->sum('total_qty');
        $hasil = transaksi::all()->sum('total_harga');
        return view('admin.pages.dashboard ', [
            'title' => 'Admin Dashboard',
            'product' => $product,
            'user' => $user,
            'totalTransaksi' => $totalTransaksi,
            'hasil' => $hasil,
        ]);
    }
    public function report()
    {
        return view('admin.pages.report ', [
            'title' => 'Admin Report',
        ]);
    }
}
