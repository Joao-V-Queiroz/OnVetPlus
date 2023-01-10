<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoAreas extends Migration
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
                'id' => '13',
                'menu' => '1',
                'position' => '5',
                'permission_id' => 1,
                'name' => 'menu.cadastros.areas',
                'icon' => 'slack',
                'url' => 'cadastros/areas',
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
        DB::table('role_permissions')->where('permission_id', 13)->delete();

        DB::table('permissions')->where('id', 13)->delete();
    }
}