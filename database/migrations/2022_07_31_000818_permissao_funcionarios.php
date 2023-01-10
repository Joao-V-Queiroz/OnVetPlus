<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoFuncionarios extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '4',
                'menu' => '1',
                'position' => '3',
                'permission_id' => 1,
                'name' => 'menu.cadastros.funcionarios',
                'icon' => 'monitor',
                'url' => 'cadastros/funcionarios',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 4)->delete();

        DB::table('permissions')->where('id', 4)->delete();
    }
}