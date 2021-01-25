<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Seller\Auth\LoginController;
use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/carts', [CartController::class, 'index'])->name('carts.index');

Route::post('/carts/{product}', [CartController::class, 'store'])->name('carts.store');

Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');

