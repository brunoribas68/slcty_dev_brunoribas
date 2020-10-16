<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormacaoTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('formacao', function (Blueprint $table) {
        $table->bigIncrements('idFormacao');
        $table->longText('instituicao');
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
      Schema::dropIfExists('formacao');
    }
}
