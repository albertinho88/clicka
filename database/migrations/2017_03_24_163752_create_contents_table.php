<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('content_id');                        
            
            $table->string('cat_id_type',10);
            $table->string('cat_det_id_type',10);
            $table->foreign(['cat_det_id_type', 'cat_id_type'])->references(['catalog_detail_id', 'catalog_id'])->on('catalog_details');
            
            $table->integer('htmlsection_id')->unsigned()->nullable();
            $table->foreign('htmlsection_id')->references('htmlsection_id')->on('htmlsections');                                    
            
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
        Schema::dropIfExists('content');
    }
}
