<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoCadastros extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '1',
                'menu' => '1',
                'position' => '1',
                'permission_id' => null,
                'name' => 'menu.cadastros',
                'icon' => 'layers',
                'url' => '',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 1)->delete();

        DB::table('permissions')->where('id', 1)->delete();
    }
}
