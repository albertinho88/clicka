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
            
            $table->string('page_id',20);
            $table->primary('page_id');
            
            $table->string('cat_id_type',10);
            $table->string('cat_det_id_type',10);
            $table->foreign(['cat_det_id_type', 'cat_id_type'])->references(['catalog_detail_id', 'catalog_id'])->on('catalog_details');
            
            // menu attributes
            
            $table->boolean('is_menu_item');
            $table->string('name')->nullable();
            $table->string('icon',20)->nullable();
            $table->string('menu_class',50)->nullable();
            $table->integer('order')->nullable();
            
            // content attributes
            
            $table->string('container_class',50)->nullable();
            $table->string('title',255)->nullable();            
            
            // general attributes
            
            $table->string('state',1);
            $table->string('page_parent_id',20)->nullable();
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
