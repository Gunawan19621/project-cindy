<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->char('muat_kelurahan_id');
            $table->text('muat_alamat');
            $table->char('bongkar_kelurahan_id');
            $table->text('bongkar_alamat');
            $table->dateTime('waktu_muat');
            $table->string('nama_muatan');
            $table->integer('berat_muatan');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

