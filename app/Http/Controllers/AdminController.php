<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // ADMIN
    public function index()
    {
        $product = product::all()->sum('quantity');
        $user = User::where(['role' => '1'])->count();
        $totalTransaksi = transaksi::all()->sum('total_qty');
        $hasil = transaksi::all()->sum('total_harga');
        $transaction = transaksi::all();
        $data = $transaction->map(function ($item) {
            return $item->total_harga;
        });
        $date = $transaction->map(function ($item) {
            return $item->created_at->format('Y-m-d'); // Mengambil tahun, bulan, dan tanggal
        });
        return view('admin.pages.dashboard ', [
            'title' => 'Admin Dashboard',
            'product' => $product,
            'user' => $user,
            'totalTransaksi' => $totalTransaksi,
            'hasil' => $hasil,
            'month' => $date,
            'data' => $data,
        ]);
    }
    public function report()
    {
        return view('admin.pages.report ', [
            'title' => 'Admin Report',
            'data' => collect()
        ]);
    }
    public function reportFilter(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $data = transaksi::whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();
        $totalTransaksi = $data->sum('total_harga');

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('admin.pdf.transaksi', ['data' => $data, 'totalTransaksi' => $totalTransaksi, 'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir]);
            return $pdf->stream('Laporan Transaksi.pdf');
        }

        return view('admin.pages.report ', [
            'title' => 'Admin Report',
            'data' => $data,
        ]);
    }
}
