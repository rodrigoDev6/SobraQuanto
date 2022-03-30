<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClienteSeeder;
// use Database\Seeders\UserSeeder;
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
        // \App\Models\User::factory(10)->create();
        $this->call(
            ClienteSeeder::class,
            CategoriaServicoSeeder::class,
            // UserSeeder::class,

        );
    }
}
