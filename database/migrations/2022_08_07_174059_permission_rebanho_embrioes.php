<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRebanhoEmbrioes extends Migration
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
                'id' => '20',
                'menu' => '1',
                'position' => '3',
                'permission_id' => 16,
                'name' => 'menu.rebanho.embrioes',
                'icon' => 'filter',
                'url' => 'rebanho/embrioes',
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
        DB::table('role_permissions')->where('permission_id', 20)->delete();
    
        DB::table('permissions')->where('id', 20)->delete();
    }
}
