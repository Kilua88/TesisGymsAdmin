<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCoutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_cuotas', function (Blueprint $table) {
            $table->increments('det_cuotas_id');
            $table->integer('act_id')->unsigned();
            $table->foreign('act_id')->references('act_id')->on('actividades');
            $table->integer('cli_id')->unsigned();
            $table->foreign('cli_id')->references('cli_id')->on('clientes');
            $table->integer('cuota_id')->unsigned();
            $table->foreign('cuota_id')->references('cuota_id')->on('cuota');
            $table->integer('valor');
            $table->timestamp('det_cuota_inicio');
            $table->timestamp('det_cuota_fin');
            $table->string('det_cuota_mes');
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
        Schema::dropIfExists('detalle_cuotas');
    }
}
