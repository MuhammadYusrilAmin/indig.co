<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->integer('user_id');
            $table->integer('address_id');
            $table->integer('discount_id')->nullable();

            $table->string('status');
            $table->string('sender');
            $table->integer('sub_total');
            $table->integer('shipping_charge');
            $table->integer('total_payment');
            $table->string('payment_method');
            $table->string('note')->nullable();
            $table->string('canceled')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
