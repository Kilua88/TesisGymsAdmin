<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('pers_id');
            $table->string('pers_dni')->nullable();
            $table->string('pers_nombre');
            $table->string('pers_apellido');
            $table->string('pers_direccion');
            $table->string('pers_telefono');
            $table->integer('pers_contact_id')->unsigned()->nullable();
            $table->foreign('pers_contact_id')->references('pers_id')->on('personas');
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
        Schema::dropIfExists('personas');
    }
}
