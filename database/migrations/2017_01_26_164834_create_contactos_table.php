<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('contact_id');            
            $table->string('name',255);
            $table->string('email',500);
            $table->string('phone',20);
            $table->text('message');            
            $table->string('ip_creator',50)->nullable();                        
            $table->integer('updater_user')->nullable();                        
            $table->string('ip_updater',50)->nullable();                        
            $table->string('state',2);            
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
        Schema::dropIfExists('contacts');
    }
}
