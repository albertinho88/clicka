<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_items', function (Blueprint $table) {
            $table->increments('sales_item_id');            
            $table->string('code',15)->unique();            
            $table->string('name',25);
            $table->text('description');
            $table->float('price',8,2);            
            $table->boolean('fixed_price');
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
        Schema::dropIfExists('sales_items');
        Schema::dropIfExists('item_types');
    }
}
