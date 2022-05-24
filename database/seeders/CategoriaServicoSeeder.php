<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaServico;

class CategoriaServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaServico::create([
            'nome' => 'Manutenção de computadores'
        ]);
        CategoriaServico::create([
            'nome' => 'Formatação'	
        ]);
        CategoriaServico::create([
            'nome' => 'Gráfica'
        ]);
        CategoriaServico::create([
            'nome' => 'Instalação de câmeras'
        ]);
    }
}
