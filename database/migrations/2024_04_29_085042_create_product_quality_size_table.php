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
            $table->integer('product_size_id')->unsigned();
            $table->integer('product_quality_id')->unsigned();
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
            $table->foreign('product_quality_id')->references('id')->on('product_qualities');
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
