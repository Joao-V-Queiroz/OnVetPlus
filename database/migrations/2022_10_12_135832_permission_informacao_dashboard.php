<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionInformacaoDashboard extends Migration
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
                'id' => '23',
                'menu' => '1',
                'position' => '0',
                'permission_id' => 22,
                'name' => 'menu.informacao.dashboard',
                'icon' => 'pie-chart',
                'url' => 'informacao/dashboard',
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
        DB::table('role_permissions')->where('permission_id', 23)->delete();
    
        DB::table('permissions')->where('id', 23)->delete();
    }
}