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
        Schema::create('product_quality_size', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('quality_id');
            $table->foreign('size_id')->references('id')->on('basic_attributes');
            $table->foreign('quality_id')->references('id')->on('basic_attributes');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->decimal('price_two', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('product__quality_size');
    }
};
