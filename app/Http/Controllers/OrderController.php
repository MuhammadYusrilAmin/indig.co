<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Midtrans;

class OrderController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }
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


    public function store(Request $request, Order $order)
    {
        $id_order = mt_rand(1000, 99999);
        $order1 = Order::create([
            'id'                => $id_order,
            'user_id'           => Auth::user()->id,
            'address_id'        => $request->address_id,
            'discount_id'       => $request->discount_id,
            'status'            => 'PENDING',
            'sender'            => 'JNE ' . explode('-', $request->shippingMethod)[0],
            'sub_total'         => $request->sub_total,
            'shipping_charge'   => $request->shipping_charge,
            'total_payment'     => $request->total_payment,
            'note'              => ""
        ]);
        if ($request->url != null) {
            $order = Cart::where('id', $request->url)->first();
            $product = Product::where('id', $order->product_id)->first();
            OrderDetail::create([
                'id'                => mt_rand(1000, 99999),
                'order_id'          => $id_order,
                'product_id'        => $order->product_id,
                'quantity'          => $order->quantity,
                'price'             => $product->price * $order->quantity,
                'request'          => $order->request
            ]);

            $order->delete();
        } else {
            $cart = Cart::whereRaw(' user_id =' . Auth::user()->id)->get();
            foreach ($cart as $cart1) {
                $product = Product::where('id', $cart1->product_id)->first();
                OrderDetail::create([
                    'id'                => mt_rand(1000, 99999),
                    'order_id'          => $id_order,
                    'product_id'        => $cart1->product_id,
                    'quantity'          => $cart1->quantity,
                    'price'             => $product->price * $cart1->quantity,
                    'request'          => $cart1->request
                ]);

                $cart1->delete();
            }
        }
        $this->getSnapRedirect($id_order);
        // ID = ICO - date(ddmmyyhms) - 4 acak - iduser
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
        $order = Order::find($id);
        $order->status = 'Inprogress';
        $order->update();

        if ($order) {
            return redirect('orders-admin')->with('successfully', 'Order accepted successfully');
        } else {
            return redirect('orders-admin')->with('error', 'Order failed to accepted');
        }
    }

    public function reject(Request $request, $id)
    {
        $order = Order::find($id);
        $order->canceled = $request->canceled;
        $order->status = 'Rejected';
        $order->update();

        if ($order) {
            return redirect('orders-admin')->with('successfully', 'Order rejected successfully');
        } else {
            return redirect('orders-admin')->with('error', 'Order failed to rejected');
        }
    }

    public function sendOrder(Request $request, $id)
    {
        $request->validate([
            'resi' => 'required',
        ]);

        $order = Order::find($id);
        $order->status = 'Pickups';
        $order->resi = $request->resi;
        $order->update();

        if ($order) {
            return redirect('orders-admin')->with('successfully', 'Order rejected successfully');
        } else {
            return redirect('orders-admin')->with('error', 'Order failed to rejected');
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
    public function getSnapRedirect($id_order)
    {
        $order = Order::find($id_order);
        $orderId = $order->id . '-' . Str::random(5);
        $price = $order->total_payment;
        $order->midtrans_booking_code = $orderId;
        $transaction_detail = [
            'order_id' => $orderId,
            'gross_amount' => $price,
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' =>  $price,
            'quantity' =>  1,
            'name' =>  'Payment for product', // tambahakan title product
        ];

        $userData = [
            "first_name" => $order->user->name,
            "last_name" => "",
            "address" => "",
            "phone" => "",
            "country_code" => "IDN"
        ];

        $customer_details = [
            "first_name" => $order->user->name,
            "last_name" => "",
            "email" => $order->user->email,
            "billing_address" => $userData,
            "shipping_address" => $userData,
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_detail,
            'customer_details' => $customer_details,
            'item_details' => $item_details
        ];

        try {
            //code...
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $order->midtrans_url = $paymentUrl;
            $order->save();

            return redirect()->to($paymentUrl);
        } catch (Exception $e) {
            //throw $th;
        }
    }

    public function midtransCallBack(Request $request)
    {
        $notif = new Midtrans\Notification();

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $order_id = explode('-', $notif->order_id)[0];
        $order = Order::find($order_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $order->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $order->payment_status = 'Lunas';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $order->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $order->payment_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $order->payment_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $order->payment_status = 'Lunas';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $order->payment_status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $order->payment_status = 'failed';
        }

        $order->save();
        return redirect('/orders');
    }
}
