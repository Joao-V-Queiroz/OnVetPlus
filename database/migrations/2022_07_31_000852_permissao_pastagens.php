<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoPastagens extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '14',
                'menu' => '1',
                'position' => '8',
                'permission_id' => 1,
                'name' => 'menu.cadastros.pastagens',
                'icon' => 'sunset',
                'url' => 'cadastros/pastagens',
            ]   
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 14)->delete();

        DB::table('permissions')->where('id', 14)->delete();
    }
}