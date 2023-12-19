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
        Schema::table('coupon_bundles', function (Blueprint $table) {
            $table->dateTime('expiry_date')->nullable();
            $table->foreignId('sub_category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');

            $table->string('video_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_bundles', function (Blueprint $table) {
            $table->dropColumn(['expiry_date', 'video_link', 'sub_category_id']);
        });
    }
};
