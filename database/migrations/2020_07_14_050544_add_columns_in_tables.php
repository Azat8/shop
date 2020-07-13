<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_address', function (Blueprint $table) {
            $table->longText('more_address')->nullable();
        });

        Schema::table('customer_addresses', function (Blueprint $table) {
            $table->longText('more_address')->nullable();
        });

        Schema::table('order_address', function (Blueprint $table) {
            $table->longText('more_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
}
