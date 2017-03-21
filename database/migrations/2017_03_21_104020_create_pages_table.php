<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('page_id');
            $table->string('name')->unique();
            $table->string('icon',20)->nullable();
            $table->string('html_class',50)->nullable();
            $table->string('state',1);
            $table->integer('order');
            $table->boolean('is_menu_item');
            $table->integer('page_parent_id')->unsigned()->nullable();
            $table->foreign('page_parent_id')->references('page_id')->on('pages');
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
        Schema::dropIfExists('pages');
    }
}
