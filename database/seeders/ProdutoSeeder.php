<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome' => 'SSD Kingston A400',
            'categoria_id' => 4,
            'valor' => 120.00,
            'quantidade' => 3
        ]);

        Produto::create([
            'nome' => 'Fone Inova',
            'categoria_id' => 9,
            'valor' => 18.00,
            'quantidade' => 10
        ]);

        Produto::create([
            'nome' => 'Cabo HDMI',
            'categoria_id' => 4,
            'valor' => 18.00,
            'quantidade' => 4
        ]);

        Produto::create([
            'nome' => 'Cabo VGA',
            'categoria_id' => 4,
            'valor' => 18.00,
            'quantidade' => 4
        ]);

        Produto::create([
            'nome' => 'Carregador Inova',
            'categoria_id' => 5,
            'valor' => 25,
            'quantidade' => 8
        ]);

        Produto::create([
            'nome' => 'Pendrive 16GB',
            'categoria_id' => 6,
            'valor' => 30,
            'quantidade' => 10
        ]);
    }
}
