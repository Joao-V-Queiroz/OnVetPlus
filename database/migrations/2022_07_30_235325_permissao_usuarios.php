<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoUsuarios extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '3',
                'menu' => '1',
                'position' => '2',
                'permission_id' => 1,
                'name' => 'menu.cadastros.usuarios',
                'icon' => 'user-plus',
                'url' => 'security/users',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 3)->delete();

        DB::table('permissions')->where('id', 3)->delete();
    }
}
