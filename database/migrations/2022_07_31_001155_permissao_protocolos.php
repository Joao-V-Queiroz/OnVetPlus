<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoProtocolos extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '5',
                'menu' => '1',
                'position' => '1',
                'permission_id' => null,
                'name' => 'menu.protocolos',
                'icon' => 'list',
                'url' => '',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 5)->delete();

        DB::table('permissions')->where('id',5)->delete();
    }
}