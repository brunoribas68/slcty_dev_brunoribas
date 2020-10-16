<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExperienciaTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('experiencia', function (Blueprint $table) {
        $table->bigIncrements('idExperiencia');
        $table->string('experiencia');
        $table->unsignedBigInteger('idUsuario');
        $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
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
      Schema::dropIfExists('experiencia');
    }
}
