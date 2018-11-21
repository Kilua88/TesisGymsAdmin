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
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('act_id')->unsigned();
            $table->foreign('act_id')->references('id')->on('actividades');
            $table->integer('cli_id')->unsigned();
            $table->foreign('cli_id')->references('id')->on('clientes');
            $table->string('moneda');
            $table->unsignedinteger('valor');
            $table->timestamp('det_cuota_inicio');
            $table->boolean('det_cuota_estado')->default(true);
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
