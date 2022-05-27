<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ 
            'nome'      => 'admin',
            'email'     => 'rodrigodev6@gmail.com',
            'senha'  => Hash::make('123456'),
            'perfil'    => 'admin'

        ]);

        User::create([
            'nome'      => 'rodrigo',
            'email'     => 'lima.rodrigo@educsi.com.br',
            'senha'  => Hash::make('123456'),
            'perfil'    => 'padrao'
        ]);
    }
}
