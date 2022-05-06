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
            $table->string('nome', 200);
            $table->char('cpf_cnpj', 14)->unique();
            $table->char('celular', 20);
            $table->string('cidade', 120)->nullable();
            $table->string('uf', 5)->nullable();
            $table->integer('cep', 20)->nullable();
            $table->string('bairro', 80)->nullable();
            $table->string('endereco', 80)->nullable();
            $table->integer('numero', 9)->nullable();
            $table->string('complemento', 80)->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
