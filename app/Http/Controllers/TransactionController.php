<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Cooperative;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use Dipantry\Rajaongkir\Models\RajaongkirCourier;
use Dipantry\Rajaongkir\Models\ROProvince;
use Illuminate\Support\Facades\DB;
use Rajaongkir;
use PDF;


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

        return view('user.transaction.checkout')->with([
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
        // $weight2 = $carts->product->weight;

        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $carts = Cart::whereRaw('id =' . $id)->orderBy('created_at', 'asc')->get();
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

        return view('user.transaction.checkout')->with([
            'addresses' => $addresses,
            'carts' => $carts,
            'cek_origin' => $cek_origin,
            'weight2' => $weight2,
            'provinces' => $provinces,
            'data2' => $data2,
        ]);
    }

    public function pdf()
    {
        $order = DB::table('orders as o')
            ->join('order_details as od', 'o.id', '=', 'od.order_id')
            ->select('o.*', 'od.*')
            ->whereRaw('od.cooperative_id =' . Auth::user()->cooperative_id . ' AND o.status = "Received" ')
            ->groupBy('od.cooperative_id')
            ->orderBy('o.created_at', 'desc')
            ->get();
        $pdf = PDF::loadView('admin.order.export-pdf', compact('order'));
        $cooperative = Cooperative::where('id', Auth::user()->cooperative_id)->first();
        return $pdf->download('laporan order' . $cooperative->name . '.pdf');
    }
}
