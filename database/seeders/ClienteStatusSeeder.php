<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClienteStatus;

class ClienteStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClienteStatus::create([
            'nome' => 'Ativo',
        ]);
        
        ClienteStatus::create([
            'nome' => 'Inativo',
        ]);

        

        
    }
}
