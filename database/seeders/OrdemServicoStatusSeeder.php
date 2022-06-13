<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrdemServicoStatus;

class OrdemServicoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrdemServicoStatus::create([
            'nome' => 'Orçamento',
        ]);
        
        OrdemServicoStatus::create([
            'nome' => 'Em anadamento',
        ]);

        OrdemServicoStatus::create([
            'nome' => 'Feita',
        ]);

        OrdemServicoStatus::create([
            'nome' => 'Interrompida',
        ]);

        
    }
}
