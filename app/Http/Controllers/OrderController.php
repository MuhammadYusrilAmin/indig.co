<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Str;

class OrderController extends Controller
{
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

    public function create()
    {
        // ID = ICO - date(ddmmyyhms) - 4 acak - iduser
    }

    public function store(Request $request, Order $order)
    {
        $this->getSnapRedirect($order);
        // ID = ICO - date(ddmmyyhms) - 4 acak - iduser
    }

    public function getSnapRedirect(Order $order)
    {
        $orderId = $order->id . '-' . Str::random(5);
        $order->midtrans_booking_code = $orderId;
        $transaction_detail = [
            'order_id' => $order
        ];
    }
}
