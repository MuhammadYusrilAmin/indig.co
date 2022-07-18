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
        Schema::create('cooperatives', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');

            $table->string('name');
            $table->string('since_year');
            $table->string('owner_name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->string('contact');
            $table->string('fax');
            $table->string('location');
            $table->text('avatar');

            $table->softDeletes();
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
        Schema::dropIfExists('cooperatives');
    }
};
