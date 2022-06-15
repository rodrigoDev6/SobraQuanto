<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdemDeServicoServico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_ordem_servico_servico', function (Blueprint $table) {
            $table->id();
            $table->integer('ordem_servico_id');
            $table->integer('servico_id');
            $table->integer('quantidade');
            $table->decimal('valor', 10, 2);
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
        Schema::dropIfExists('table_ordem_servico_servico');
    }
}
