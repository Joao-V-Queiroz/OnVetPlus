<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionRebanho extends Migration
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
                'id' => '16',
                'menu' => '1',
                'position' => '3',
                'permission_id' => null,
                'name' => 'menu.rebanho',
                'icon' => 'tag',
                'url' => '',
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
        DB::table('role_permissions')->where('permission_id', 16)->delete();

        DB::table('permissions')->where('id',16)->delete();
    }
}