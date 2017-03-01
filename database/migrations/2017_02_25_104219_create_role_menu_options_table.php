<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleMenuOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_menu_options', function (Blueprint $table) {
            $table->increments('role_menu_id');
            $table->integer('role_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('menu_id')->references('menu_id')->on('menu_options');
            $table->string('state',1);            
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
        Schema::dropIfExists('roles_menu_options');
    }
}
