<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nome' => 'Rodrigo de Lima Alves',
            'cpf_cnpj' => '12345678911',
            'telefoneCelular' => '(21)975021234',
            'cidade' => 'Rio de Janeiro',
            'uf' => 'RJ',
            'endereco' => 'Estrada da barra da tijuca',
            'numero' => '3222',
            'bairro' => 'Itanhangá',
            'complemento' => 'Rua Pau brasil',
        ]);
    }
}
