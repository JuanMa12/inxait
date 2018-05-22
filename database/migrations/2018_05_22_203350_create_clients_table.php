<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clients', function (Blueprint $table) {
          $table->increments('id')->index();
          $table->string('name');
          $table->string('last_name');
          $table->integer('identification',12);
          $table->integer('state')->unsigned();
          $table->foreign('state')->references('id')->on('departaments');
          $table->integer('city')->unsigned();
          $table->foreign('city')->references('id')->on('cities');
          $table->integer('phone',12);
          $table->string('email');
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
        Schema::dropIfExists('clients');
    }
}
