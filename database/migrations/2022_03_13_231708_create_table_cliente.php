<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->char('cpf_cnpj', 14)->unique();
            $table->char('telefone_1', 11);
            $table->char('telefone_2', 11)->nullable();
            $table->char('cep', 8)->nullable();
            $table->integer('estado_id')->nullable();
            $table->string('logradouro', 80)->nullable();
            $table->string('bairro', 80)->nullable();
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
        Schema::dropIfExists('cliente');
    }
}
