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

        Cliente::create([
            'nome' => 'Luiz Ricardo',
            'cpf_cnpj' => '12345678908',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Rua da chacara',
        ]);
        
        Cliente::create([
            'nome' => 'Maria das Flores',
            'cpf_cnpj' => '12345678907',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Rua da chacara',
        ]);

        Cliente::create([
            'nome' => 'João Silva',
            'cpf_cnpj' => '12345678906',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Rua da chacara',
        ]);

        Cliente::create([
            'nome' => 'Joana Lima',
            'cpf_cnpj' => '12345678905',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua da chacara',
            'bairro' => 'Itanhangá',
            'complemento' => 'AP 404',
        ]);
        
        Cliente::create([
            'nome' => 'José da Silva',
            'cpf_cnpj' => '12345678904',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Itanhangá',
            'complemento' => 'Casa 32',
        ]);

        Cliente::create([
            'nome' => 'Maria das Dores',
            'cpf_cnpj' => '12345678903',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Muzema',
            'complemento' => 'Rua Nova',
        ]);

        Cliente::create([
            'nome' => 'José da Costa',
            'cpf_cnpj' => '12345678902',
            'telefone_1' => '21975021234',
            'estado_id' => 1,
            'logradouro' => 'Rua B',
            'bairro' => 'Muzema',
            'complemento' => 'Rua 2',
        ]);

    }
}
