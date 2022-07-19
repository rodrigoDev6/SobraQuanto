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
            'nome' => 'Agendamentos',
        ]);

        CategoriaProduto::create([
            'nome' => 'Acessórios',
        ]);
    
        CategoriaProduto::create([
            'nome' => 'Adaptadores',
        ]);

        CategoriaProduto::create([
            'nome' => 'Cabos',
        ]);

        CategoriaProduto::create([
            'nome' => 'Carregadores',
        ]);

        CategoriaProduto::create([
            'nome' => 'Pendrives',
        ]);

        CategoriaProduto::create([
            'nome' => 'Mouses com fio',
        ]);
        
        CategoriaProduto::create([
            'nome' => 'Mouses sem fio',
        ]);

        CategoriaProduto::create([
            'nome' => 'Fones de com Fio',
        ]);

        CategoriaProduto::create([
            'nome' => 'Fones sem Fio',
        ]);

        CategoriaProduto::create([
            'nome' => 'Fontes',
        ]);

        CategoriaProduto::create([
            'nome' => 'HDs',
        ]);


        CategoriaProduto::create([
            'nome' => 'Roteadores',
        ]);

        CategoriaProduto::create([
            'nome' => 'Teclados',
        ]);

        CategoriaProduto::create([
            'nome' => 'Gráfica',
        ]);


        CategoriaProduto::create([
            'nome' => 'Seguro desemprego',
        ]);

        CategoriaProduto::create([
            'nome' => 'Suporte remoto',
        ]);
    }
}
