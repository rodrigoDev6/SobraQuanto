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
            'cpf_cnpj' => '12345678909',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Rua da chacara',
        ]);
    }
}
