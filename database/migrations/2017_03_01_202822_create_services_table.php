<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {            
            $table->string('service_id',20);
            $table->primary('service_id');
            
            $table->string('name',50);
            $table->string('slogan',500);
            $table->string('icon',20)->nullable();
            $table->string('website_bg_color',6)->nullable();
            $table->text('website_html_content')->nullable();
            $table->boolean('featured');
            $table->string('state',1);
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
        Schema::dropIfExists('services');
    }
}
