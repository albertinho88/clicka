<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_options', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('label',100);
            $table->string('url',500);                        
            $table->string('type',10);
            $table->string('state',1);
            $table->integer('order');
            $table->integer('menu_parent_id')->unsigned()->nullable();
            $table->foreign('menu_parent_id')->references('menu_id')->on('menu_options');
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
        Schema::dropIfExists('menu_options');
    }
}
