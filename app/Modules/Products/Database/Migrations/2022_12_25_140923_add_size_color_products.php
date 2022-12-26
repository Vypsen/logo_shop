<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_color_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->cascadeOnDelete();

            $table->foreignId('size_id');
            $table->foreign('size_id')
                ->references('id')->on('sizes')
                ->cascadeOnDelete();

            $table->foreignId('color_id');
            $table->foreign('color_id')
                ->references('id')->on('colors')
                ->cascadeOnDelete();

            $table->unsignedInteger('count_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_color_products');
    }
};
