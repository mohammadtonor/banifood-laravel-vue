<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peyments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('method');
            $table->string('gateway')->nullable();
            $table->string('ref_num')->nullable();
            $table->integer('amount');
            $table->tinyInteger('status')->comment('0 : Incomplete , 1 : Complete');
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
        Schema::dropIfExists('peyments');
    }
}
