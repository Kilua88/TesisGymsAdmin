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
            $table->increments('id');
            $table->unsignedinteger('pers_dni');
            $table->string('pers_nombre');
            $table->string('pers_apellido');
            $table->string('pers_direccion');
            $table->string('pers_telefono');
            $table->string('pers_email');
            $table->boolean('estado')->default('true');
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
