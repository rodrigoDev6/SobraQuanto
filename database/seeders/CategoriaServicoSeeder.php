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
            'nome' => 'Banner'
        ]);
        CategoriaServico::create([
            'nome' => 'Arte'	
        ]);
        CategoriaServico::create([
            'nome' => 'Limpeza'
        ]);
        CategoriaServico::create([
            'nome' => 'Formatação'
        ]);
        CategoriaServico::create([
            'nome' => 'Instalação'
        ]);
    }
}
