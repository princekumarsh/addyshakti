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
        Schema::create('coupon_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', [0, 1,2])->default(0);
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreignId('sub_category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->float('price', 8, 2);
            $table->string('no_of_coupons');
            $table->string('code')->unique();
            $table->string('discount')->nullable();
            $table->string('slug');
            $table->foreignId('created_by')->nullable()->references('id')->on('vendors')->onDelete('cascade');
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
        Schema::dropIfExists('coupon_bundles');
    }
};