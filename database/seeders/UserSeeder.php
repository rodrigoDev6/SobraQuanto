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
            'email'     => 'lima.rodrigo@educsi.com.br',
            'password'  => Hash::make('123456789'),
            'perfil'    => 'admin'

        ]);

        User::create([
            'name'      => 'admin',
            'email'     => 'lima2.rodrigo@educsi.com.br',
            'password'  => Hash::make('123456789'),
            'perfil'    => 'admin'
        ]);
    }
}
