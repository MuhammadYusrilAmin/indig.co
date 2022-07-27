<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Kasir;
use App\Models\ProductGallery;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $product = Product::all();
        $galleries = ProductGallery::get();

        return view(
            'admin.transaction.kasir',
            compact('kasir'),
            compact('product'),
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = mt_rand(1000, 99999);
        $product = Product::where('id', $request->id)->first();
        $order = Kasir::create([
            'id'                => $id,
            'user_id'           => Auth::user()->id,
            'product_id'        => $product->id,
            'quantity'          => '1',
            'price'             => $product->price,
        ]);


        if ($order) {
            return redirect('/kasir');
        } else {
            return redirect('/kasir');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Kasir::where('user_id', $id);
        $cart->delete();
        return redirect('/kasir');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = Kasir::find($id);
        $product = Product::find($kasir->product_id);
        $product->stock =  $product->stock + $kasir->quantity;
        $product->update();
        $kasir->delete();
        return redirect('/kasir');
    }


    public function minus_quantity(Request $request)
    {
        $id_kasirs = $request->id_kasirs;
        $kasir = Kasir::where('id', $id_kasirs)->first();
        if ($kasir->quantity == 1) {
            $kasir->quantity = $kasir->quantity;
            $kasir->update();
            echo "$kasir->quantity";
        } else {
            $product = Product::find($kasir->product_id);
            $product->stock = $product->stock + 1;
            $product->update();
            $kasir->quantity = $kasir->quantity - 1;
            $kasir->price = $kasir->price - $product->price;
            $kasir->update();
            echo $kasir->quantity;
        }
    }


    public function plus_quantity(Request $request)
    {
        $id_kasirs = $request->id_kasirs;
        $kasir = Kasir::where('id', $id_kasirs)->first();
        $product = Product::find($kasir->product_id);
        if ($kasir->quantity == $kasir->quantity + $product->stock) {
            $kasir->quantity = $kasir->quantity;
            $kasir->update();
            echo "$kasir->quantity";
        } else {
            $product->stock = $product->stock - 1;
            $product->update();
            $kasir->quantity = $kasir->quantity + 1;
            $kasir->price = $kasir->price + $product->price;
            $kasir->update();
            echo $kasir->quantity;
        }
    }
}
