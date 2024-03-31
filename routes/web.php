<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/shop', [Controller::class, 'shop'])->name('shop');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');
Route::get('/admin', [Controller::class, 'adminLogin'])->name('adminLogin');
Route::post('/admin/loginProses', [Controller::class, 'loginProses'])->name('loginProses');

Route::group(['middleware'=>'admin'],function(){
    // Admin
    Route::get('/admin/logout', [Controller::class, 'logout'])->name('logout');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/report', [AdminController::class, 'report'])->name('report');

    // user
    Route::get('/admin/user_management', [UserController::class, 'index'])->name('userManagement');
    Route::get('/admin/user_management/addUser', [userController::class, 'addUser'])->name('addModalUser');
    Route::post('/admin/user_management/addUser', [UserController::class, 'store'])->name('addDataUser');
    Route::get('/admin/user_management/edituser/{id}', [UserController::class, 'show'])->name('editModalUser');
    Route::put('/admin/user_management/updateDataUser/{id}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/admin/user_management/deleteDataUser/{id}', [UserController::class, 'destroy'])->name('deleteUser');

    // product 
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('/admin/product/addModal', [ProductController::class, 'addModal'])->name('addModal');
    Route::post('/admin/product/addData', [ProductController::class, 'store'])->name('addData');
    Route::get('/admin/product/editModal/{id}', [ProductController::class, 'show'])->name('editModal');
    Route::put('/admin/product/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
    Route::delete('/admin/product/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');
});

