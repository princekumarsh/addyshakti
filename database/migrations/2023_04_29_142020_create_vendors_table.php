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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_gst')->nullable();
            $table->string('company_address')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('business_category')->references('id')->on('categories')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status',[1,0])->default(0);
            $table->string('password');
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('vendors');

  }
};