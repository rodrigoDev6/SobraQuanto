<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servico::create([
            'nome' => 'Milheiro de cartão de visita',
            'valor' => 100.00,
        ]);

        Servico::create([
            'nome' => 'Formatação de computador',
            'valor' => 80.00,	
        ]);

        Servico::create([
            'nome' => 'Criação de Logomarca',
            'valor' => 50.00,
        ]);

        Servico::create([
            'nome' => 'Instalação de câmeras',
            
        ]);
    }
}
