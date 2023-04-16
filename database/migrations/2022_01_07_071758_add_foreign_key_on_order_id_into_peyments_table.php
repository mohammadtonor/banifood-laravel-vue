<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyOnOrderIdIntoPeymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peyments', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peyments', function (Blueprint $table) {
            //
        });
    }
}
