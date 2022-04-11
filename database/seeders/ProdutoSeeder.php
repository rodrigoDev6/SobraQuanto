<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'valor' => 120,32
        ]);
    }
}
