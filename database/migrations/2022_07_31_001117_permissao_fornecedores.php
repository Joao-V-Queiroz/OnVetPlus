<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoFornecedores extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '12',
                'menu' => '1',
                'position' => '7',
                'permission_id' => 1,
                'name' => 'menu.cadastros.fornecedores',
                'icon' => 'truck',
                'url' => 'cadastros/fornecedores',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 12)->delete();

        DB::table('permissions')->where('id', 12)->delete();
    }
}