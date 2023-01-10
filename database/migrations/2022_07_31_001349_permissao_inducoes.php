<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoInducoes extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '8',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 5,
                'name' => 'menu.protocolos.inducoes',
                'icon' => 'arrow-right',
                'url' => 'protocolos/inducoes',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 8)->delete();

        DB::table('permissions')->where('id', 8)->delete();
    }
}