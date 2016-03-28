<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBoatAddMOT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // first we want to remove the boat images.

        Schema::drop('boats');
        Schema::drop('boat_image');

        // now we create a MOT database

        Schema::create('mots', function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->string('day');
            $table->string('month');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mots');
    }
}
