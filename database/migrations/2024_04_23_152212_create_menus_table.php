<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->string('menu_name');
            $table->string('menu_link');
            $table->enum('menu_category', ['master menu', 'sub menu']);
            $table->integer('menu_sub')->nullable();
            $table->integer('menu_position');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('menus');
    }
}