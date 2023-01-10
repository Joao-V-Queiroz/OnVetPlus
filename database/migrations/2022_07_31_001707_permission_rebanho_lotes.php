<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRebanhoLotes extends Migration
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
                'id' => '17',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 16,
                'name' => 'menu.rebanho.lotes',
                'icon' => 'grid',
                'url' => 'rebanho/lotes',
            ]
        );
    }   

        public function down()
        {
            DB::table('role_permissions')->where('permission_id', 17)->delete();
    
            DB::table('permissions')->where('id', 17)->delete();
        }
}