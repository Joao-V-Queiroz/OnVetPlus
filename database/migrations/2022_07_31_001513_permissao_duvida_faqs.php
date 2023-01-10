<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoDuvidaFaqs extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '9',
                'menu' => '1',
                'position' => '1',
                'permission_id' => 7,
                'name' => 'menu.duvida.faqs',
                'icon' => 'thumbs-up',
                'url' => 'duvida/faqs',
            ]
        );
    }

    public function down()
    {
        DB::table('role_permissions')->where('permission_id', 9)->delete();

        DB::table('permissions')->where('id', 9)->delete();
    }
}