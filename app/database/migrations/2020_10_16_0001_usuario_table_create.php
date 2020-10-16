<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuario', function (Blueprint $table) {
        $table->bigIncrements('idUsuario');
        $table->string('nome');
        $table->string('email');
        $table->string('telefone');
        $table->string('usuario');
        $table->string('senha');
     });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('users');
    }
}
