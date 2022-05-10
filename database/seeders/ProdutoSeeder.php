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
            'nome' => 'SSD',
            'categoria_id' => 1,
            'valor' => 120,
            'quantidade' => 1,
        ]);
    }
}
