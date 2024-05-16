<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/signin', [AuthController::class, 'SignIn']);
    Route::post('/signup', [AuthController::class, 'SignUp']);
    Route::get('/signout', [AuthController::class, 'SignOut'])->middleware('auth:sanctum');
    // data product
    Route::post('/addData', [AuthController::class, 'addProduct'])->middleware('auth:sanctum');
    Route::get('/getData', [AuthController::class, 'getAllProduct'])->middleware('auth:sanctum');
    Route::get('/getData/{id}', [AuthController::class, 'getProductById'])->middleware('auth:sanctum');
    Route::put('/updateData/{id}', [AuthController::class, 'updateProduct'])->middleware('auth:sanctum');
    Route::delete('/deleteData/{id}', [AuthController::class, 'deleteProduct'])->middleware('auth:sanctum');
    // data user
    Route::get('/getUser', [AuthUserController::class, 'getUser'])->middleware('auth:sanctum');
    Route::post('/addUser', [AuthUserController::class, 'addUser'])->middleware('auth:sanctum');
    Route::delete('/deleteUser/{id}', [AuthUserController::class, ' deleteUser'])->middleware('auth:sanctum');
});

Route::get('/tokens', function (Request $request) {
    return $request->user()->tokens;
})->middleware('auth:sanctum');

Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
