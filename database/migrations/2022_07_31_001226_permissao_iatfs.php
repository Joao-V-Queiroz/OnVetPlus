<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoIatfs extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '11',
                'menu' => '1',
                'position' => '2',
                'permission_id' => 5,
                'name' => 'menu.protocolos.iatfs',
                'icon' => 'arrow-right',
                'url' => 'protocolos/iatfs',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 10)->delete();

        DB::table('permissions')->where('id', 10)->delete();
    }
}