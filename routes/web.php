<?php

use App\Http\Controllers\ProductController;
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
Route::resource('/products', ProductController::class);

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

// beberapa fungsi endpoint resource yang perlu kita ketahui:
// 1. Route get => nama_route => menjalankan fungsi index
// 2. Route get => nama_route/create => menjalankan fungsi create
// 3. Route post => nama_route => menjalankan fungsi store
// 4. Route get => nama_route/{ id } => menjalankan fungsi show
// 5. Route put/patch => nama_route/{ id } => menjalankan fungsi update
// 6. Route delete => nama_route/{ id } => menjalankan fungsi delete
// 7. Route get => nama_route/{ id }/edit => menjalankan fungsi edit
