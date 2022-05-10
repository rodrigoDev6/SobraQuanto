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
            'nome' => 'impressão',
        ]);
    }
}
