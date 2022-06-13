<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdemServico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_de_servico', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->integer('status_id');
            $table->string('forma_pagamento');
            $table->date('data_abertura');
            $table->date('data_fechamento')->nullable();
            $table->string('observacao')->nullable();
            $table->float('total', 10, 2);
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
        Schema::dropIfExists('ordem_de_servico');
    }
}
