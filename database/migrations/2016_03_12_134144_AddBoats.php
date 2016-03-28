<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('make');
            $table->string('model');
            $table->string('loa');
            $table->string('beam');
            $table->string('draught');
            $table->string('clearance');
            $table->string('fuel_capacity');
            $table->string('water_capacity');
            $table->string('displacement');
            $table->string('speed');
            $table->string('engine_make');
            $table->string('engine_model');
            $table->string('engine_hp');
            $table->string('engine_fuel_type');
            $table->string('engine_age');
            $table->string('boat_age');
            $table->string('single_or_twin');
            $table->string('price');
            $table->string('description');
            $table->string('notes');
            $table->string('specification');
            $table->string('progress');
            $table->string('new_or_used');
            $table->string('disclamer');
            $table->string('weight');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('boat_image', function (Blueprint $table) {
            $table->integer('boat_id');
            $table->integer('image_id');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boats');
        Schema::drop('boat_image');
    }
}
