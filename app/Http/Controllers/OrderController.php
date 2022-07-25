<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Order::all()->sortByDesc('updated_at');
        $user = User::all();
        $items = OrderDetail::get();

        return view(
            'admin.order.index',
            compact('datas'),
            compact('user'),
            compact('items'),
        );
    }

    public function orders()
    {
        $datas = Order::all()->sortByDesc('updated_at');
        $user = User::all();
        $items = OrderDetail::get();

        return view(
            'admin.order.index-admin',
            compact('datas'),
            compact('user'),
            compact('items'),
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
        // date(ddmmyyhms) - 4 acak - iduser
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Order::find($id);
        $items = OrderDetail::find($id)->all()->sortByDesc('updated_at');
        $rating = Rating::find($id)->all();

        return view(
            'admin.order.detail',
            compact('show'),
            compact('items'),
        );
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
        $order = Order::find($id);
        $order->status = 'Inprogress';
        $order->update();

        if ($order) {
            return redirect('orders')->with('successfully', 'Order accepted successfully');
        } else {
            return redirect('orders')->with('error', 'Order failed to accepted');
        }
    }

    public function reject(Request $request, $id)
    {
        $order = Order::find($id);
        $order->canceled = $request->canceled;
        $order->status = 'Rejected';
        $order->update();

        if ($order) {
            return redirect('orders')->with('successfully', 'Order rejected successfully');
        } else {
            return redirect('orders')->with('error', 'Order failed to rejected');
        }
    }

    public function sendOrder($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->update();

        if ($order) {
            return redirect('orders')->with('successfully', 'Order rejected successfully');
        } else {
            return redirect('orders')->with('error', 'Order failed to rejected');
        }
    }

    public function acceptOrder($id)
    {
        $order = Order::find($id);
        $order->status = 'Received';
        $order->update();

        if ($order) {
            return redirect('orders')->with('successfully', 'Order received successfully');
        } else {
            return redirect('orders')->with('error', 'Order failed to received');
        }
    }

    public function cancellOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->canceled = $request->canceled;
        $order->status = 'Cancelled';
        $order->update();

        if ($order) {
            return redirect('orders')->with('successfully', 'Order rejected successfully');
        } else {
            return redirect('orders')->with('error', 'Order failed to rejected');
        }
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
