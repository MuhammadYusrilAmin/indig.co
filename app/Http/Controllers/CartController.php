<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $wishlists = Wishlist::whereRaw('user_id =' . Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $product = Product::all();
        $galleries = ProductGallery::get();

        return view(
            'user.transaction.cart',
            compact('carts'),
            compact('wishlists'),
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
        $cart = Cart::where('product_id', $request->id)->first();
        $product = Product::where('id', $request->id)->first();
        if ($cart  == null) {
            $order = Cart::create([
                'id'                => $id,
                'user_id'           => Auth::user()->id,
                'product_id'        => $request->id,
                'quantity'          => $request->quantity,
                'price'             => $request->price,
                'request'           => $request->request2,
                'cities_id'        => $request->cities_id
            ]);


            if ($order) {
                return redirect('/cart');
            } else {
                return redirect('/');
            }
        } else {
            $cart->quantity =  $cart->quantity + 1;
            $cart->price =  $cart->price + $product->price;
            $cart->update();

            return redirect('/cart');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::where('user_id', $id);
        $cart->delete();
        return redirect('/cart');
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
        $cart = Cart::find($id);
        $product = Product::find($cart->product_id);
        $product->stock =  $product->stock + $cart->quantity;
        $product->update();
        $cart->delete();
        return redirect('/cart');
    }


    public function minus_quantity(Request $request)
    {
        $id_cart = $request->id_cart;
        $cart = Cart::where('id', $id_cart)->first();
        if ($cart->quantity == 1) {
            $cart->quantity = $cart->quantity;
            $cart->update();
            echo "$cart->quantity";
        } else {
            $product = Product::find($cart->product_id);
            $product->stock = $product->stock + 1;
            $product->update();
            $cart->quantity = $cart->quantity - 1;
            $cart->price = $cart->price - $product->price;
            $cart->update();
            echo $cart->quantity;
        }
    }


    public function plus_quantity(Request $request)
    {
        $id_cart = $request->id_cart;
        $cart = Cart::where('id', $id_cart)->first();
        $product = Product::find($cart->product_id);
        if ($cart->quantity == $cart->quantity + $product->stock) {
            $cart->quantity = $cart->quantity;
            $cart->update();
            echo "$cart->quantity";
        } else {
            $product->stock = $product->stock - 1;
            $product->update();
            $cart->quantity = $cart->quantity + 1;
            $cart->price = $cart->price + $product->price;
            $cart->update();
            echo $cart->quantity;
        }
    }
}
