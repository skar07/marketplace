<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::redirect('/','/home');


Auth::routes();

//Home route
Route::get('/home', [ App\Http\Controllers\HomeController::class, 'index' ])->name('home');

// Routes related to Cart functionality
Route::get('/add-to-cart/{product}', [ App\Http\Controllers\CartController::class, 'add' ]) -> name('cart.add') -> middleware('auth');
Route::get('/cart', [ App\Http\Controllers\CartController::class, 'index' ]) -> name('cart.index') -> middleware('auth');
Route::get('/cart/destroy/{itemId}', [ App\Http\Controllers\CartController::class, 'destroy' ]) -> name('cart.delete') -> middleware('auth');
Route::get('/cart/update/{itemId}', [ App\Http\Controllers\CartController::class, 'update' ]) -> name('cart.update') -> middleware('auth');
Route::get('/cart/checkout', [ App\Http\Controllers\CartController::class, 'checkout' ]) -> name('cart.checkout') -> middleware('auth');

//Orders table (or) checkout routes
Route::resource('orders', 'App\Http\Controllers\OrderController') -> middleware('auth');

//Stripe routes
Route::get('/stripe-payment', [App\Http\Controllers\StripeController::class, 'handleGet']) -> name('stripe.checkout');
Route::post('/stripe-payment', [App\Http\Controllers\StripeController::class, 'handlePost'])->name('stripe.payment');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
