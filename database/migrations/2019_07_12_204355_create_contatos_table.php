<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**  */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email');
            $table->string('telefone');
            $table->string('imagem');
            $table->timestamps();
        });
    }

    /**  */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
