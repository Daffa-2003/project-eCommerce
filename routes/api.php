<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    Route::post('/addData', [AuthController::class, 'addProduct']);
    Route::get('/getData', [AuthController::class, 'getAllProduct']);
});

Route::get('/tokens', function (Request $request) {
    return $request->user()->tokens;
})->middleware('auth:sanctum');

Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
