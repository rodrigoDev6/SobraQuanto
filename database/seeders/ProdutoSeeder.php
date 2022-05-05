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
            'valor' => 120.32
        ]);
        
        Produto::create([
            'nome' => 'Doces',
            'valor' => 120.32
        ]);
        
        Produto::create([
            'nome' => 'Periféricos',
            'valor' => 120.32
        ]);

        Produto::create([
            'nome' => 'Hardware',
            'valor' => 120.32
        ]);
    
    }
}
