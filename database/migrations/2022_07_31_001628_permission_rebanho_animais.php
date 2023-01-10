<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRebanhoAnimais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '18',
                'menu' => '1',
                'position' => '0',
                'permission_id' => 16,
                'name' => 'menu.rebanho.animais',
                'icon' => 'gitlab',
                'url' => 'rebanho/animais',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 18)->delete();
    
        DB::table('permissions')->where('id', 18)->delete();
    }
}