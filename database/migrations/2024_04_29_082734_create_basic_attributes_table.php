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
        Schema::create('basic_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string("value");
            $table->unsignedBigInteger("type");
            $table->foreign('type')->references('id')->on('basic_attributes');
            $table->integer("order");
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
        Schema::dropIfExists('basic_attributes');

    }
};
