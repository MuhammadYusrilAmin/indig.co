<?php

use App\Http\Controllers\Auth\RegisterCooperativeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TransactionController;
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
Route::get('index/{locale}', [HomeController::class, 'lang']);

//Update User Details
Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [HomeController::class, 'index'])->name('index');

Route::get('/', [HomeController::class, 'root'])->name('root');
Route::get('/sellers/{id}', [HomeController::class, 'showSeller'])->name('showSeller');

Route::resource('register-cooperative', RegisterCooperativeController::class);

// DASHBOARD
Route::resource('dashboard', DashboardController::class);

Route::resource('products', ProductController::class)->middleware('auth');
Route::get('detail_products', [ProductController::class, 'show'])->middleware('auth');
Route::resource('orders', OrderController::class)->middleware('auth');
Route::get('orders-admin', [OrderController::class, 'orders'])->middleware('auth');
Route::post('reject-order/{id}', [OrderController::class, 'reject'])->middleware('auth');
Route::post('send-order/{id}', [OrderController::class, 'sendOrder'])->middleware('auth');
Route::post('accept-order/{id}', [OrderController::class, 'acceptOrder'])->middleware('auth');
Route::post('cancell-order/{id}', [OrderController::class, 'cancellOrder'])->middleware('auth');
Route::resource('employees', EmployeeController::class)->middleware('auth');
Route::resource('transaction', TransactionController::class)->middleware('auth');
Route::resource('cart',  \App\Http\Controllers\CartController::class)->middleware('auth');
Route::resource('orderDetail',  \App\Http\Controllers\OrderDetailController::class)->middleware('auth');

Route::post('/minus_quantity',  [\App\Http\Controllers\CartController::class, 'minus_quantity'])->middleware('auth');
Route::post('/plus_quantity',  [\App\Http\Controllers\CartController::class, 'plus_quantity'])->middleware('auth');
Route::post('/getkabupaten',  [IndoRegionController::class, 'getkabupaten'])->middleware('auth');
Route::post('/getkecamatan',  [IndoRegionController::class, 'getkecamatan'])->middleware('auth');
Route::post('/getdesa',  [IndoRegionController::class, 'getdesa'])->middleware('auth');
Route::resource('/whistlist', \App\Http\Controllers\WhishlistController::class)->middleware('auth');
Route::resource('/address',  \App\Http\Controllers\AddressController::class);

// PROFILE
Route::resource('profile', ProfileController::class);
Route::post('change-password/{id}', [ProfileController::class, 'changePassword']);
Route::get('faqs', function () {
    return view('profile.faqs');
});
Route::get('chat', function () {
    return view('profile.chat');
});

// SUPER ADMIN
Route::resource('dashboard-admin', SuperAdminController::class);
Route::post('reject-cooperative/{id}', [SuperAdminController::class, 'reject']);

// beberapa fungsi endpoint resource yang perlu kita ketahui:
// 1. Route get => nama_route => menjalankan fungsi index
// 2. Route get => nama_route/create => menjalankan fungsi create
// 3. Route post => nama_route => menjalankan fungsi store
// 4. Route get => nama_route/{ id } => menjalankan fungsi show
// 5. Route put/patch => nama_route/{ id } => menjalankan fungsi update
// 6. Route delete => nama_route/{ id } => menjalankan fungsi delete
// 7. Route get => nama_route/{ id }/edit => menjalankan fungsi edit
