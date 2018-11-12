<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGimnasiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gimnasios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('gym_nombre');
            $table->string('gym_direccion');
            $table->unsignedinteger('gym_telefono');
            $table->string('gym_url');
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
        Schema::dropIfExists('gimnasios');
    }
}
