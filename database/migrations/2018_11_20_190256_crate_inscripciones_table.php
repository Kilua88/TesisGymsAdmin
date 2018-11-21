<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cli_id')->unsigned();
            $table->foreign('cli_id')->references('id')->on('clientes');
            $table->integer('act_id')->unsigned();
            $table->foreign('act_id')->references('id')->on('actividades');
            $table->timestamp('insc_finaliza');
            $table->boolean('insc_estado')->default(true);             
            $table->boolean('insc_alta')->default(true); 
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
        Schema::dropIfExists('inscripciones');
    }
}
