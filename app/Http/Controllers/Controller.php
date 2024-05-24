<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\product;
use App\Models\tbl_cart;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // PELANGGAN
    public function index()
    {
        $best = product::where('quantity_out', '>=', 5)->where('is_active', 1)->get();
        $data = product::where('is_active', 1)->paginate(8);
        $contKeranjang = tbl_cart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.pages.home', [
            'title' => 'Home',
            'data' => $data,
            'best' => $best,
            'keranjang' => $contKeranjang,
        ]);
    }

    public function showKategori($kategori, $type)
    {
        $produk = product::where(['kategori' => $kategori, 'type' => $type])->where('is_active', 1)->paginate(8);
        $contKeranjang = tbl_cart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.pages.shop', [
            'title' => 'Shop',
            'produk' => $produk,
            'keranjang' => $contKeranjang,
        ]);
    }

    public function shopProses(Request $request)
    {
        $type = $request->input('type');
        $kategori = $request->input('kategori');
        $data = product::where('kategori', $kategori, 'type', $type)->paginate(8);
        return view('pelanggan.pages.shop', [
            'title' => 'Shop',
            'data' => $data,
        ]);
    }

    public function contact()
    {
        $contKeranjang = tbl_cart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.pages.contact', [
            'title' => 'Contact', 'keranjang' => $contKeranjang,
        ]);
    }
    public function transaksi()
    {
        $db = tbl_cart::with('product')->where(['idUser' => 'guest123', 'status' => 0])->get();
        $contKeranjang = tbl_cart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.pages.transaksi', [
            'title' => 'Transaksi',
            'keranjang' => $contKeranjang,
            'data' => $db,
        ]);
    }
    public function checkout()
    {
        $contKeranjang = tbl_cart::where(['idUser' => 'guest123', 'status' => 0])->count();
        $code = transaksi::count();
        $codeTransaksi = date('Ymd') . $code;
        $detailBelanja = detail_transaksi::where(['id_transaksi' => $codeTransaksi, 'status' => 0])->sum('price');
        $jumlahBarng = detail_transaksi::where(['id_transaksi' => $codeTransaksi, 'status' => 0])->count('id_product');
        $qtyBarang = detail_transaksi::where(['id_transaksi' => $codeTransaksi, 'status' => 0])->sum('qty');
        return view('pelanggan.pages.checkout', [
            'title' => 'Checkout', 'keranjang' => $contKeranjang,
            'detailBelanja' => $detailBelanja,
            'jumlahBarng' => $jumlahBarng,
            'qtyBarang' => $qtyBarang,
            'codeTransaksi' => $codeTransaksi,
        ]);
    }

    public function prosesCheckout(Request $request, $id)
    {
        $data = $request->all();
        $cartItem = tbl_cart::find($id);
        $product = product::find($cartItem->id_product);
        if ($data['qty'] > $product->quantity) {
            Alert::toast('Stok Barang Tidak Cukup', 'error');
            return back();
        }

        $code = transaksi::count();
        $codeTransaksi =  date('Ymd')  . $code;

        // simpan detail barang
        $detailModelTransaksi = new detail_transaksi();
        $fieldDetail = [
            'id_transaksi' => $codeTransaksi,
            'id_product' => $data['idBarang'],
            'qty' => $data['qty'],
            'price' => $data['total'],
        ];
        $detailModelTransaksi::create($fieldDetail);

        // update quantity barang
        $fieldCart = [
            'qty' => $data['qty'],
            'price' => $data['total'],
            'status' => 1,
        ];
        tbl_cart::where('id', $id)->update($fieldCart);
        Alert::toast('Checkout Berhasil', 'success');
        return redirect()->route('checkout');
    }

    public function batalCheckout($id)
    {
        $tblProduct = tbl_cart::findOrFail($id);
        $tblProduct->delete();
        Alert::toast('Checkout Dibatalkan', 'error');
        return redirect()->route('home');
    }

    public function prosesPembayaran(Request $request)
    {
        $data = $request->all();
        // dd($data);die;
        $dbTransaksi = new transaksi();
        $dbTransaksi->code_transaksi = $data['kodeTransaksi'];
        $dbTransaksi->total_qty = $data['qty'];
        $dbTransaksi->total_harga = $data['totalBayar'];
        $dbTransaksi->nama_pembeli = $data['namaPenerima'];
        $dbTransaksi->alamat = $data['alamatPenerima'];
        $dbTransaksi->no_tlp = $data['tlp'];
        $dbTransaksi->ekspedisi = $data['ekspedisi'];
        $dbTransaksi->ongkir = $data['ongkir'];
        $dbTransaksi->bayar = $data['bayar'];
        $dbTransaksi->kembali = $data['kembalian'];
        $dbTransaksi->save();

        $dataCart = detail_transaksi::where('id_transaksi', $data['kodeTransaksi'])->get();
        foreach ($dataCart as $x) {
            $dataUp = detail_transaksi::where('id', $x->id)->first();
            $dataUp->status = 1;
            $dataUp->save();

            $dataProduct = product::where('id', $x->id_product)->first();
            $dataProduct->quantity_out = $dataProduct->quantity_out + $x->qty;
            $dataProduct->quantity = $dataProduct->quantity - $x->qty;

            if ($dataProduct->quantity == 0) {
                $dataProduct->is_active = 0;
            }

            $dataProduct->save();
        }
        Alert::alert()->success('Transaksi berhasil', 'Ditunggu barangnya');
        return redirect()->route('home');
    }

    public function adminLogin()
    {
        return view('admin.pages.login', [
            'title' => 'Admin Login',
            'name' => 'Login Admin'
        ]);
    }

    public function loginProses(Request $request)
    {
        Session::flash('error', $request->email);
        $dataLogin = [
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => '1'
        ];

        $user = new User();
        // $proses = $user::where('email', $request->email)->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 0])) {
            Session::flash('error', 'Anda Bukan Admin');
            return back();
        }
        if (Auth::attempt($dataLogin)) {
            // Session::flash('success', 'Login Berhasil');
            Alert::toast('Login Berhasil', 'success');
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } else {
            // Session::flash('error', 'Email dan Password tidak valid');
            Alert::toast('Email dan Password tidak valid', 'error');
            return back();
        }

        // $remember = !empty($request->remember) ? true : false;
        // if (Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'is_admin' => '1'
        // ], $remember)) {
        //     Alert::toast('Login Berhasil', 'success');
        //     $request->session()->regenerate();
        //     return redirect()->intended('/admin/dashboard');
        // }
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => '0'], $remember)) {
        //     Alert::toast('Anda Bukan Admin', 'error');
        //     return back();
        // } else {
        //     Alert::toast('Email dan Password tidak valid', 'error');
        //     return back();
        // }
    }

    public function logout()
    {
        Auth::logout();
        request()->Session()->invalidate();
        request()->Session()->regenerateToken();
        Alert::toast('Berhasil Logout', 'success');
        return redirect('/');
    }
}
