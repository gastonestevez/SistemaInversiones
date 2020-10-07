<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('fecha');
            $table->string('link_web');
            $table->string('imagen_360');
            $table->string('estados');
            $table->integer('porcentaje');
            $table->timestamps();

            $table->bigInteger('localidad_id')->unsigned()->nullable();
            $table->foreign('localidad_id')->references('id')->on('localidades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
