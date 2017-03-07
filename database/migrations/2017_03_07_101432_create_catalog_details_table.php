<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_details', function (Blueprint $table) {
            $table->string('catalog_detail_id',10);
            $table->string('value',255);
            $table->string('catalog_id',10);            
            $table->foreign('catalog_id')->references('catalog_id')->on('catalogs');
            $table->string('state',1);
            $table->timestamps();
            
            $table->primary('catalog_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_details');
    }
}
