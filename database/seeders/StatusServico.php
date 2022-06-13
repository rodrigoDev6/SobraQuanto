<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicoStatus;

class ServicoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicoStatus::create([
            'nome' => 'Orçamento',
        ]);
        
        ServicoStatus::create([
            'nome' => 'Em anadamento',
        ]);

        ServicoStatus::create([
            'nome' => 'Feita',
        ]);

        ServicoStatus::create([
            'nome' => 'Interrompida',
        ]);

        
    }
}
