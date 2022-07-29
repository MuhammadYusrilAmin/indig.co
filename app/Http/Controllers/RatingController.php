<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
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
        $id = $request->id;
        $rating = OrderDetail::where('order_id', $id)->get();
        foreach ($rating as $rating1) {
            $rating_product = $rating1->id;
            $description = 'deskripsi' . $rating1->id;
            $ratings = Rating::create([
                'id'                => mt_rand(1000, 99999),
                'product_id'        => $rating1->product_id,
                'order_id'   => $rating1->order_id,
                'rating'            => $request->$rating_product,
                'review'            => $request->$description
            ]);
        }
        return redirect('orders');

        if ($ratings) {
        } else {
            return redirect('orders');
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
