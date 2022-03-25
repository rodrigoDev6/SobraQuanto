<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome' , 200);
            $table->string('sobrenome' , 200);
            $table->string('email', 10)->unique();
            $table->char('tipo_usuario', 10)->nullable();
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
        Schema::dropIfExists('table_usuarios');
    }
}
