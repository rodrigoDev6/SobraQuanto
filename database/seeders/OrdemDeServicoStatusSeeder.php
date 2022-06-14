<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrdemDeServicoStatus;

class OrdemDeServicoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrdemDeServicoStatus::create([
            'nome' => 'Orçamento',
        ]);
        
        OrdemDeServicoStatus::create([
            'nome' => 'Em anadamento',
        ]);

        OrdemDeServicoStatus::create([
            'nome' => 'Feita',
        ]);

        OrdemDeServicoStatus::create([
            'nome' => 'Interrompida',
        ]);

        
    }
}
