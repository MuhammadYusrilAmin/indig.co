<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterCooperativeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;
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

// Route::get('{any}', [HomeController::class, 'index'])->name('index');

Route::post('register', [RegisterController::class, 'create']);
Route::resource('register-cooperative', RegisterCooperativeController::class);

Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::resource('dashboard-admin', SuperAdminController::class);
    Route::post('reject-cooperative/{id}', [SuperAdminController::class, 'reject']);
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::resource('products', ProductController::class)->middleware('auth');
Route::get('detail_products', [ProductController::class, 'show'])->middleware('auth');

Route::post('reject-order/{id}', [OrderController::class, 'reject'])->middleware('auth');
Route::post('accept-order/{id}', [OrderController::class, 'acceptOrder'])->middleware('auth');
Route::post('cancell-order/{id}', [OrderController::class, 'cancellOrder'])->middleware('auth');
Route::get('orders-admin', [OrderController::class, 'orders'])->middleware('auth');
Route::post('send-order/{id}', [OrderController::class, 'sendOrder'])->middleware('auth');

Route::resource('kasir', KasirController::class)->middleware('auth');
Route::post('/kasir_minus_quantity',  [\App\Http\Controllers\KasirController::class, 'minus_quantity'])->middleware('auth');
Route::post('/kasir_plus_quantity',  [\App\Http\Controllers\KasirController::class, 'plus_quantity'])->middleware('auth');
Route::get('/export-printer',  [\App\Http\Controllers\KasirController::class, 'printer'])->middleware('auth');

Route::get('/export-pdf',  [\App\Http\Controllers\TransactionController::class, 'pdf'])->middleware('auth');

Route::resource('ratings', RatingController::class)->middleware('auth');

Route::get('/', [HomeController::class, 'root'])->name('root')->middleware('auth');
Route::get('/sellers/{id}', [HomeController::class, 'showSeller'])->name('showSeller')->middleware('auth');

Route::resource('orders', OrderController::class)->middleware('auth');

Route::resource('orderDetail',  \App\Http\Controllers\OrderDetailController::class)->middleware('auth');

Route::resource('search', SearchController::class)->middleware('auth');

Route::resource('transaction', TransactionController::class);

Route::resource('cart',  \App\Http\Controllers\CartController::class)->middleware('auth');
Route::post('/minus_quantity',  [\App\Http\Controllers\CartController::class, 'minus_quantity'])->middleware('auth');
Route::post('/plus_quantity',  [\App\Http\Controllers\CartController::class, 'plus_quantity'])->middleware('auth');

Route::resource('/whistlist', \App\Http\Controllers\WhishlistController::class)->middleware('auth');

Route::resource('/address',  \App\Http\Controllers\AddressController::class)->middleware('auth');

//midtrans gateway
Route::get('payment/success', [OrderController::class, 'midtransCallBack'])->middleware('auth');
Route::post('payment/success', [OrderController::class, 'midtransCallBack'])->middleware('auth');

// get Wilayah
Route::post('/getkabupaten',  [IndoRegionController::class, 'getkabupaten'])->middleware('auth');
Route::post('/getkecamatan',  [IndoRegionController::class, 'getkecamatan'])->middleware('auth');
Route::post('/getdesa',  [IndoRegionController::class, 'getdesa'])->middleware('auth');

// PROFILE
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::post('change-password/{id}', [ProfileController::class, 'changePassword'])->middleware('auth');
Route::get('faqs', function () {
    return view('profile.faqs');
})->middleware('auth');
Route::get('chat', function () {
    return view('profile.chat');
})->middleware('auth');

// beberapa fungsi endpoint resource yang perlu kita ketahui:
// 1. Route get => nama_route => menjalankan fungsi index
// 2. Route get => nama_route/create => menjalankan fungsi create
// 3. Route post => nama_route => menjalankan fungsi store
// 4. Route get => nama_route/{ id } => menjalankan fungsi show
// 5. Route put/patch => nama_route/{ id } => menjalankan fungsi update
// 6. Route delete => nama_route/{ id } => menjalankan fungsi delete
// 7. Route get => nama_route/{ id }/edit => menjalankan fungsi edit
