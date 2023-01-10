<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRebanhoSemens extends Migration
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
                'id' => '19',
                'menu' => '1',
                'position' => '2',
                'permission_id' => 16,
                'name' => 'menu.rebanho.semens',
                'icon' => 'droplet',
                'url' => 'rebanho/semens',
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
        DB::table('role_permissions')->where('permission_id', 19)->delete();
    
        DB::table('permissions')->where('id', 19)->delete();
    }
}
