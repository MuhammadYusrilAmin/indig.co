<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use Dipantry\Rajaongkir\Models\RajaongkirCourier;
use Dipantry\Rajaongkir\Models\ROProvince;
use Rajaongkir;

class TransactionController extends Controller
{
    public function index()
    {
        // Contoh Starter
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $carts = Cart::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'asc')->get();
        $cek_origin = Cart::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $provinces  = ROProvince::all();
        $weight2 = null;
        foreach ($carts as $value) {
            $product = Product::where('id', $value->product_id)->get();
            foreach ($product as $key) {
                $weight2 += $key->weight;
            }
        }

        $data = Rajaongkir::getOngkirCost(
            $origin = $cek_origin->cities_id,
            $destination =  $_GET['id'],
            $weight = $weight2,
            $courier = RajaongkirCourier::JNE
        );
        $konten = json_encode($data);
        $data2 = json_decode($konten, true);

        return view('admin.transaction.checkout')->with([
            'addresses' => $addresses,
            'carts' => $carts,
            'cek_origin' => $cek_origin,
            'weight2' => $weight2,
            'provinces' => $provinces,
            'data2' => $data2,
        ]);
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
