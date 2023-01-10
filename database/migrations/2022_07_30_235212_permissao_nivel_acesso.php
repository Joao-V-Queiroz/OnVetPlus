<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoNivelAcesso extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '2',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 1,
                'name' => 'menu.cadastros.nivel-acesso',
                'icon' => 'unlock',
                'url' => 'security/role',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 2)->delete();

        DB::table('permissions')->where('id', 2)->delete();
    }
}
