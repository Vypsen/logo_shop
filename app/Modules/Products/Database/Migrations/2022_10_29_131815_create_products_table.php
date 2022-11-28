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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('article_number');
            $table->string('name');
            $table->string('name_on_site');
            $table->string('slug')->unique();
            $table->string('description');
            $table->unsignedDouble('price');
            $table->unsignedDouble('discount_price');
            $table->boolean('is_sale');
            $table->boolean('is_new');
            $table->boolean('is_show');

            $table->foreignId('brand_id');
            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->cascadeOnDelete();

            $table->foreignId('category_id');
            $table->foreign('category_id')
                ->references('id')->on('product_categories')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('products');
    }
};
