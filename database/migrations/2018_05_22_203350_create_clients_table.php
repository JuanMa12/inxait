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
          $table->increments('id');
          $table->string('name');
          $table->string('last_name');
          $table->integer('identification')->length(10);
          $table->integer('state')->unsigned();
    			$table->foreign('state')
    				->references('id')
    				->on('departaments')
    				->onDelete('cascade')
    				->onUpdate('cascade');
          $table->integer('city')->unsigned();
    			$table->foreign('city')
    				->references('id')
    				->on('cities')
    				->onDelete('cascade')
    				->onUpdate('cascade');
          $table->integer('phone')->length(10);
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
