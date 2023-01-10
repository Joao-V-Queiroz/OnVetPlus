<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Security\Role;

class AddUserAdmin extends Migration
{
    public function up()
    {
        $role = new Role();
        $role->name = 'Administrador';
        $role->save();

        $user = new User();
        $user->role_id = $role->id;
        $user->imagem = 'public\images\avatars\admin.jpg';
        $user->name = 'Administrador do Sistema';
        $user->email = 'suporte@wsbrasil.com';
        $user->password = bcrypt('suporte@wsbrasil.com');
        $user->save();
    }

    public function down()
    {
        \DB::statement("SET foreign_key_checks=0");
        \DB::table('users')->truncate();
        \DB::table('roles')->truncate();
        \DB::statement("SET foreign_key_checks=1");
    }
}
