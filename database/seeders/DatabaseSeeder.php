<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\ClienteSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategoriaServicoSeeder;
use Database\Seeders\CategegoriaProdutoSeeder;
use Database\Seeders\ProdutoSeeder;

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
            ClienteSeeder::class,
            UserSeeder::class,
            CategoriaServicoSeeder::class,
            CategoriaProdutoSeeder::class,
            ProdutoSeeder::class
        ]);
    }
}
