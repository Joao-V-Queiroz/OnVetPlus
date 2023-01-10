<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTes extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '10',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 5,
                'name' => 'menu.protocolos.tes',
                'icon' => 'arrow-right',
                'url' => 'protocolos/tes',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 10)->delete();

        DB::table('permissions')->where('id', 10)->delete();
    }
}