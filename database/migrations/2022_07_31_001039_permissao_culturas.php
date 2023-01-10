<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoCulturas extends Migration
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
                'id' => '15',
                'menu' => '1',
                'position' => '6',
                'permission_id' => 1,
                'name' => 'menu.cadastros.culturas',
                'icon' => 'feather',
                'url' => 'cadastros/culturas',
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
        DB::table('role_permissions')->where('permission_id', 15)->delete();

        DB::table('permissions')->where('id', 15)->delete();
    }
}