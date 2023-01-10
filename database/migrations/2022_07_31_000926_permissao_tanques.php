<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoTanques extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '6',
                'menu' => '1',
                'position' => '4',
                'permission_id' => 1,
                'name' => 'menu.cadastros.tanques',
                'icon' => 'thermometer',
                'url' => 'cadastros/tanques',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 6)->delete();

        DB::table('permissions')->where('id', 6)->delete();
    }
}