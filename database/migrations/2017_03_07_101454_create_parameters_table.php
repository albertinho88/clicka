<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->string('parameter_id',10);
            $table->string('description',255);
            $table->string('value_type');
            $table->decimal('numeric_value')->nullable();
            $table->string('string_value')->nullable();
            $table->date('date_value')->nullable();
            $table->string('state',1);
            $table->timestamps();
            
            $table->primary('parameter_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
