<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory(1)->create();
        ProductCategory::factory(1)->create();
        ProductGallery::factory(1)->create();
        Address::factory(2)->create();
        Order::factory(1)->create();
        OrderDetail::factory(1)->create();
        Rating::factory(1)->create();
        Cart::factory(1)->create();
        Wishlist::factory(1)->create();
    }
}
