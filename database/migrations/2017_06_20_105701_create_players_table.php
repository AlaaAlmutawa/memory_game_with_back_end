<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');//do we need this??
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();//what if they play twice with the same email?? should it be unique
            $table->string('phone_number')->nullable();
            $table->string('time_record');
            $table->boolean('shared_fb')->nullable();
            $table->string('difficulty');
            $table->timestamps();//to keep track of when they played
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
