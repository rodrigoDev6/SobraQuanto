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
            'name'      => 'Rodrigo',
            'email'     => 'rodrigodev6@gmail.com',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin'

        ]);

        User::create([ 
            'name'      => 'Erick',
            'email'     => 'erickguerra.prof@gmail.com',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin'

        ]);


        User::create([
            'name'      => 'Luiz',
            'email'     => 'luiz@gmail.com',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin',
        ]);

        User::create([
            'name'      => 'John',
            'email'     => 'john@educs.com.br',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin',
        ]);

        User::create([
            'name'      => 'Lucas',
            'email'     => 'lucas@educs.com.br',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin',
        ]);

        User::create([
            'name'      => 'André',
            'email'     => 'andr@andr.com.br',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin',
        ]);
        }

}
