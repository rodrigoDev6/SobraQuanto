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
            'cep' => '98888888',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Apto. 101',
        ]);

        Cliente::create([
            'nome' => 'Luiz Ricardo',
            'cpf_cnpj' => '12345678908',
            'telefone_1' => '21975021234',
            'cep' => '27363900',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Apto. 108',
        ]);
        
        Cliente::create([
            'nome' => 'Maria das Flores',
            'cpf_cnpj' => '12345678907',
            'telefone_1' => '21975021234',
            'cep' => '22303900',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Apto. 109',
        ]);

        Cliente::create([
            'nome' => 'João Silva',
            'cpf_cnpj' => '12345678906',
            'telefone_1' => '21975021234',
            'cep' => '22303900',
            'estado_id' => 1,
            'logradouro' => 'Rua C',
            'bairro' => 'Itanhangá',
            'complemento' => 'Casa 1',
        ]);

        Cliente::create([
            'nome' => 'Joana Lima',
            'cpf_cnpj' => '12345678905',
            'telefone_1' => '21975021234',
            'cep' => '22303920',
            'estado_id' => 1,
            'logradouro' => 'Rua da amendoeira',
            'bairro' => 'Itanhangá',
            'complemento' => 'Apartamento 101',
        ]);
        
        Cliente::create([
            'nome' => 'José da Silva',
            'cpf_cnpj' => '12345678904',
            'telefone_1' => '21975021234',
            'cep' => '22303900',
            'estado_id' => 1,
            'logradouro' => 'Jardim dos Anjos',
            'bairro' => 'Itanhangá',
            'complemento' => 'Casa 32',
        ]);

        Cliente::create([
            'nome' => 'Maria das Dores',
            'cpf_cnpj' => '12345678903',
            'telefone_1' => '21975021234',
            'cep' => '22303900',
            'estado_id' => 1,
            'logradouro' => 'Jardim Carlos Gomes',
            'bairro' => 'Muzema',
            'complemento' => 'Prédio A - apartamento 101',
        ]);

        Cliente::create([
            'nome' => 'José da Costa',
            'cpf_cnpj' => '12345678902',
            'telefone_1' => '21975021234',
            'cep' => '22303900',
            'estado_id' => 1,
            'logradouro' => 'Rua dos Bobos',
            'bairro' => 'Muzema',
            'complemento' => 'Apartamento 101',
        ]);

    }
}
