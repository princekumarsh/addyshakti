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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            $table->foreignId('vendor_id')->nullable()->references('id')->on('vendors')->onDelete('cascade');
            $table->longText('coupon_details')->nullable();
            $table->integer('qty');
            $table->integer('use_coupon')->default(0);
            $table->double('price', 8, 2);
            $table->double('tax', 8, 2);
            $table->string('delivery_status')->default('pending');
            $table->string('key_id')->unique();
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
        Schema::dropIfExists('order_details');
    }
};