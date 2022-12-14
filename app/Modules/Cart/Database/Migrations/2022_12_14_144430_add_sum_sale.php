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
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedDouble('total_sale', 16, 2);
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->unsignedDouble('item_sale', 16, 2);
            $table->unsignedDouble('total_sale', 16, 2);
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
            $table->dropColumn('item_sale', 'total_sale');
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('total_sale');
        });
    }
};
