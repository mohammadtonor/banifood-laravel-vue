<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_order', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('menu_id')->unsigned();
            $table->bigInteger('location_id');

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('no action');
            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('CASCADE')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_order');
    }
}
