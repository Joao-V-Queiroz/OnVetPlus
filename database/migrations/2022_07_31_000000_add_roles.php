<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(
            [
                [
                    'id' => 9,
                    'name' => 'Veterinário',
                    'created_at' => '2022-01-26 16:55:45',
                    'updated_at' => '2022-01-26 16:55:45'
                ],
                [
                    'id' => 10,
                    'name' => 'Financeiro',
                    'created_at' => '2022-01-26 16:55:45',
                    'updated_at' => '2022-01-26 16:55:45'
                ],
            ]
        );

        DB::table('role_permissions')->insert(
            [
                [
                    'role_id' => 9,
                    'permission_id' => 1
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 4
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 19
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 21
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 25
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 26
                ],
                [
                    'role_id' => 10,
                    'permission_id' => 19
                ],
                [
                    'role_id' => 10,
                    'permission_id' => 21
                ],
                [
                    'role_id' => 10,
                    'permission_id' => 26
                ],
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
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
