<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clientes::create([
            'nome' => 'Rodrigo de Lima Alves',
            'cpf' => 12345678911,
            'telefone' => 21975021234,
            'cidade' => 'Rio de Janeiro',
            'estado' => 'Rio de Janeiro' ,
            'uf' => 'RJ',
            'endereco' => 'Estrada da barra da tijuca - 3222',
            'bairro' => 'Itanhangá',
            'complemento' => 'Rua Pau brasil',
        ]);
    }
}
