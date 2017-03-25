<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_content', function (Blueprint $table) {
            $table->increments('page_content_id');            
            $table->string('page_id',20);
            $table->integer('content_id')->unsigned();
            $table->foreign('page_id')->references('page_id')->on('pages');
            $table->foreign('content_id')->references('content_id')->on('content');
            $table->integer('order');            
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
        Schema::dropIfExists('page_content');
    }
}
