<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();

            $table->bigInteger('proyecto_id')->unsigned()->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('tipo_de_referente_id')->unsigned()->nullable();
            $table->foreign('tipo_de_referente_id')->references('id')->on('tipo_de_referentes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referentes');
    }
}
