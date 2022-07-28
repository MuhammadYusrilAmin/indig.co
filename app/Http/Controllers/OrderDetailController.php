<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cart = Cart::where('product_id', $request->id)->first();
        if ($cart  == null) {
            $id = mt_rand(1000, 99999);
            $order = Cart::create([
                'id'                => $id,
                'user_id'           => Auth::user()->id,
                'product_id'        => $request->id,
                'quantity'          => $request->quantity,
                'price'             => $request->price,
                'request'           => $request->request2,
                'cities_id'        => $request->cities_id
            ]);

            $address = Address::where('user_id', Auth::user()->id)->first();
            $id_address = null;
            if ($address == null) {
                $id_address = 1;
            } else {
                $id_address = $address->regencies_id;
            }

            if ($order) {
                return redirect()->route('transaction.show', $id . '?id=' . $id_address);
            } else {
                return redirect('/');
            }
        } else {
            $cart->quantity =  $cart->quantity + 1;
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
        //
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
        //
    }
}
