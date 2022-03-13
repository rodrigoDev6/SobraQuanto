<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SiteController extends Controller
{
    public function problemas(){
        return view('site.problemas');   
    }
    public function teste(){
        //Permission::create(['name' => 'acessar_produtos']);
        //Permission::create(['name' => 'ver_produtos']);
        //Permission::create(['name' => 'inserir_produtos']);
        //Permission::create(['name' => 'editar_produtos']);
        //Permission::create(['name' => 'deletar_produtos']);

        //Role::create(['name' => 'admin']);

        $role = Role::findByName('admin');

        //$role->givePermissionTo('acessar_produtos');
        $user = User::find(1);

        //$user->assignRole($role);
        $user->givePermissionTo('ver_produtos');
        
        
        dd($user->getAllPermissions());
    }
}