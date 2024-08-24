<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return redirect()->route('products.index');
});
Route::resource('products', ProductController::class);

Route::get('cart', [App\Http\Controllers\CartController::class, 'index'])->name('products.cart');
Route::get('add-to-cart/{id}',  [App\Http\Controllers\CartController::class, 'addToCart'])->name('products.cart.add');
Route::get('remove-from-cart/{id}',  [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('products.cart.remove');
