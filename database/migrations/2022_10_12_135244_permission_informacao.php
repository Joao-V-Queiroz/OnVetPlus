<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionInformacao extends Migration
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
                'id' => '22',
                'menu' => '1',
                'position' => '0',
                'permission_id' => null,
                'name' => 'menu.informacao',
                'icon' => 'clipboard',
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
        DB::table('role_permissions')->where('permission_id', 22)->delete();

        DB::table('permissions')->where('id',22)->delete();
    }
}
