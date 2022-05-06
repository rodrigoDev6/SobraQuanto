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
            'nome' => 'Lima Default',
            'cpf_cnpj' => '12345678909',
            'celular' => '(21)975021234',
            'cidade' => 'Rio de Janeiro',
            'uf' => 'RJ',
            'endereco' => 'Estrada da barra da tijuca',
            'complemento' => 'Rua Pau brasil',
            'numero' => '3222',
            'bairro' => 'Itanhangá',
        ]);
    }
}
