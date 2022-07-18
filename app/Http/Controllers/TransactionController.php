<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $carts = Cart::all()->sortByDesc('updated_at');
        $wishlists = Wishlist::all()->sortByDesc('updated_at');
        $product = Product::all();
        $galleries = ProductGallery::get();

        return view(
            'admin.transaction.cart',
            compact('carts'),
            compact('wishlists'),
            compact('product'),
        );
    }

    public function create()
    {
        $addresses = Address::all()->sortByDesc('updated_at');
        $carts = Cart::all()->sortByDesc('updated_at');
        $product = Product::all();
        $galleries = ProductGallery::get();

        return view(
            'admin.transaction.checkout',
            compact('addresses'),
            compact('carts'),
            compact('product'),
        );
    }
}