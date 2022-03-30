<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\ClienteSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategoriaServicoSeeder;

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
        ]);
    }
}
