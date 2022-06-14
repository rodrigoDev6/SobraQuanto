<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\UserSeeder;
use Database\Seeders\EstadoSeeder;
use Database\Seeders\ClienteSeeder;
use Database\Seeders\ServicoSeeder;
use Database\Seeders\CategoriaProdutoSeeder;
use Database\Seeders\ProdutoSeeder;
use Database\Seeders\ClienteStatusSeeder;
use Database\Seeders\OrdemDeServicoStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            EstadoSeeder::class,
            ClienteStatusSeeder::class,
            ClienteSeeder::class,
            CategoriaProdutoSeeder::class,
            ProdutoSeeder::class,
            ServicoSeeder::class,
            OrdemDeServicoStatusSeeder::class,
        ]);
    }
}
