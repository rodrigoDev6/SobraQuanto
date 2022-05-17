<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaProduto;

class CategoriaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaProduto::create([
            'nome' => 'Notebook',
        ]);

        CategoriaProduto::create([
            'nome' => 'Doces',
        ]);

        CategoriaProduto::create([
            'nome' => 'HD Mecanico',
        ]);

        CategoriaProduto::create([
            'nome' => 'HD SSD',
        ]);
        
        CategoriaProduto::create([
            'nome' => 'Carregador',
        ]);

        CategoriaProduto::create([
            'nome' => 'Fone de com Fio',
        ]);

        CategoriaProduto::create([
            'nome' => 'Fone sem Fio',
        ]);

        CategoriaProduto::create([
            'nome' => 'Fontes',
        ]);

        CategoriaProduto::create([
            'nome' => 'Cabos',
        ]);
    }
}
