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
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreignId('color_id');
            $table->foreign('color_id')
                ->references('id')->on('colors')
                ->cascadeOnDelete();

            $table->foreignId('size_id');
            $table->foreign('size_id')
                ->references('id')->on('sizes')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropColumn('color_id', 'size_id');
        });
    }
};
