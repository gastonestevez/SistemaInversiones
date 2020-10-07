<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('inversion');
            $table->timestamps();

            $table->bigInteger('proyecto_id')->unsigned()->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_proyectos');
    }
}
