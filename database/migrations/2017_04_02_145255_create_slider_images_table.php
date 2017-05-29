<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_images', function (Blueprint $table) {
            $table->increments('slider_image_id');
            $table->string('image_path',500);
            $table->string('caption',100)->nullable();
            $table->string('icon',50)->nullable();
            $table->integer('order');            
            $table->integer('slider_id')->unsigned();            
            $table->foreign('slider_id')->references('slider_id')->on('sliders');
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
        Schema::dropIfExists('slider_images');
    }
}
