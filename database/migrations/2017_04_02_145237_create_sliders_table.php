<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('slider_id');
            $table->string('name',50);            
            $table->boolean('animate_automatically');
            $table->integer('transition_speed');
            $table->integer('time_between_transition');
            $table->boolean('show_pager');
            $table->boolean('show_navigation');
            $table->boolean('random_slides_order');
            $table->boolean('pause_on_hover');
            $table->boolean('pause_hover_controls');
            $table->string('prev_text',50)->nullable();
            $table->string('next_text',50)->nullable();
            $table->string('max_width',10)->nullable();
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
        
    }
}
