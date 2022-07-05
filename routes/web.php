<?php

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

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// BERANDA
Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('/seller-details', function () {
    return view('user.seller-details');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// PRODUCT
Route::get('/products', function () {
    return view('admin.product.index');
});
Route::get('/products/add', function () {
    return view('admin.product.add');
});
Route::get('/products-detail', function () {
    return view('admin.product.detail');
});

// ORDER
Route::get('/orders', function () {
    return view('admin.order.index');
});
Route::get('/orders/detail', function () {
    return view('admin.order.detail');
});

// CUSTOMER
Route::get('/customers', function () {
    return view('admin.customer.index');
});

// TRANSACTION
Route::get('/cart', function () {
    return view('admin.transaction.cart');
});
Route::get('/checkout', function () {
    return view('admin.transaction.checkout');
});

// PROFILE
Route::get('/profile', function () {
    return view('profile.index');
});
Route::get('/settings', function () {
    return view('profile.settings');
});
Route::get('/faqs', function () {
    return view('profile.faqs');
});
Route::get('/chat', function () {
    return view('profile.chat');
});
Route::get('/lockscreen', function () {
    return view('profile.lockscreen');
});
