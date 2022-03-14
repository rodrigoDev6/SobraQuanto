<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 70);
            $table->integer('cpf')->unique();
            $table->integer('telefone');
            $table->string('cidade', 120);
            $table->string('estado', 75);
            $table->string('uf', 5);
            $table->string('endereco', 80);
            $table->string('bairro', 80);
            $table->string('complemento', 80);
            $table->timestamps();
        });
    }

    /**21975028324
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_clientes');
    }
}
