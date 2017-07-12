<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('quotation_id');
            
            $table->string('name',50);
            $table->string('identification',13)->nullable();                        
            $table->string('email',30)->nullable();
            $table->string('phone',10)->nullable();
            $table->integer('days_of_validity');
            $table->string('state',1);
            $table->text('observation')->nullable(); 
            
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
        Schema::dropIfExists('quotations');
    }
}
