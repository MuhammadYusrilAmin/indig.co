<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Dipantry\Rajaongkir\Models\RajaongkirCourier;
use Dipantry\Rajaongkir\Models\ROProvince;
use Dipantry\Rajaongkir\Models\ROCity;
use Dipantry\Rajaongkir\Models\ROSubDistrict;
use Dipantry\Rajaongkir\Models\ROCountry;
use PhpParser\Node\Stmt\Echo_;
use PHPUnit\Framework\Constraint\Count;
use Rajaongkir;

class TransactionController extends Controller
{
    public function index()
    {
        // Contoh Starter
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $carts = Cart::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view(
            'admin.transaction.checkout',
            compact('addresses'),
            compact('carts'),
        );
    }

    public function cek_ongkir_first()
    {
    }

    public function create()
    {
    }

    public function show($id)
    {
        $carts = Cart::where('id', $id)->get();
        $provinces = Province::all();
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $product = Product::all();
        $galleries = ProductGallery::get();

        return view(
            'admin.transaction.checkout',
            compact('addresses'),
            compact('carts'),
            compact('product'),
            compact('provinces')
        );
    }
}
