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
            $table->string('titulo')->unique();
            $table->string('slug')->unique();
            $table->string('fecha')->nullable();
            $table->string('link_web')->nullable();
            $table->string('imagen_360')->nullable();
            $table->string('estados')->nullable();
            $table->integer('porcentaje')->nullable();
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
