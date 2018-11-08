<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inst_id')->unsigned();
            $table->foreign('inst_id')->references('id')->on('instructores');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('horario_id')->unsigned();
            $table->foreign('horario_id')->references('id')->on('horario');
            $table->integer('act_id')->unsigned();
            $table->foreign('act_id')->references('id')->on('actividades');
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
        Schema::dropIfExists('detalles_actividades');
    }
}
