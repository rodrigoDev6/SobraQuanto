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
            'nome' => 'SSD Kingston',
            'categoria_id' => 4,
            'valor' => 120,
            'quantidade' => 1,
        ]);

        Produto::create([
            'nome' => 'HD Barracuda',
            'categoria_id' => 3,
            'valor' => 5,
            'quantidade' => 1,
        ]);

        Produto::create([
            'nome' => 'Paçoquita',
            'categoria_id' => 2,
            'valor' => 0.50,
            'quantidade' => 1,
        ]);

        Produto::create([
            'nome' => 'Cabo HDMI',
            'categoria_id' => 3,
            'valor' => 18.50,
            'quantidade' => 1,
        ]);

        Produto::create([
            'nome' => 'Redmin Airdots',
            'categoria_id' => 5,
            'valor' => 80,
            'quantidade' => 1,
        ]);
    }
}
