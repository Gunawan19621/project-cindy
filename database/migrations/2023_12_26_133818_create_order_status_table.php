<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTable extends Migration
{
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('status_id');
            $table->dateTime('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_status');
    }
}
