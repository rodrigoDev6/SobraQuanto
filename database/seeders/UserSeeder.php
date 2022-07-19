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
            'name'      => 'Rafael lima',
            'email'     => 'jubaoinformatica@gmail.com',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin'

        ]);

        User::create([
            'name'      => 'rodrigo',
            'email'     => 'rodrigolima.alves21@gmail.com',
            'password'     => Hash::make('123456'),
            'perfil'    => 'admin',
        ]);
        }

}
