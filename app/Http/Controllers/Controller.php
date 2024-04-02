<?php

namespace App\Http\Controllers;

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
        return view('pelanggan.pages.home', [
            'title' => 'Home',
        ]);
    }
    public function shop()
    {
        return view('pelanggan.pages.shop', [
            'title' => 'Shop',
        ]);
    }
    public function contact()
    {
        return view('pelanggan.pages.contact', [
            'title' => 'Contact',
        ]);
    }
    public function transaksi()
    {
        return view('pelanggan.pages.transaksi', [
            'title' => 'Transaksi',
        ]);
    }
    public function checkout()
    {
        return view('pelanggan.pages.checkout', [
            'title' => 'Checkout',
        ]);
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
        return redirect('/admin');
    }
}
