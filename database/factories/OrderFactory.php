<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => 'ICO27052212341',
            'user_id' => 1,
            'address_id' => 1,
            // 'discount_id' => 1,
            'status' => 'Delivered',
            'sender' => 'Express Delivery',
            'sub_total' => 159900,
            'shipping_charge' => 22000,
            'total_payment' => 181900,
            'payment_method' => 'Cash On Delivery (COD)',
            'note' => 'Pesanan sudah sesuai ya kak',
            'canceled' => 'Ingin merubah alamat',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        // return $this->state(function (array $attributes) {
        //     return [
        //         'email_verified_at' => null,
        //     ];
        // });
    }
}
