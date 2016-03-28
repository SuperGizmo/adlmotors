<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('surname');
            $table->string('contactNumber');
            $table->string('firstLineAddress');
            $table->string('secondLineAddress');
            $table->string('thirdLineAddress');
            $table->string('city');
            $table->string('county');
            $table->string('postcode');
            $table->string('question');
            $table->string('email');
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
        Schema::drop('contacts');
    }
}
