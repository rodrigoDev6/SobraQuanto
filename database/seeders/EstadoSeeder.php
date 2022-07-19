<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'uf' => 'RJ',
            'nome' => 'Rio de Janeiro',
        ]);

        Estado::create([
            'uf' => 'SP',
            'nome' => 'São Paulo',
        ]);

        Estado::create([
            'uf' => 'MG',
            'nome' => 'Minas Gerais',
        ]);

        Estado::create([
            'uf' => 'ES',
            'nome' => 'Espírito Santo',
        ]);

    }
}
