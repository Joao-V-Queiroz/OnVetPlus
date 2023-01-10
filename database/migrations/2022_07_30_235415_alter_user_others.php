<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserOthers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('home_id')
                ->nullable()
                ->after('role_id')
            ;

            $table->string('jobtitle')
                ->nullable()
                ->after('remember_token')
            ;

            $table->string('phone', 15)
                ->nullable()
                ->after('jobtitle')
            ;

            $table->string('cellphone', 15)
                ->nullable()
                ->after('phone')
            ;

            $table->tinyInteger('active')
                ->default(1)
                ->after('cellphone')
            ;
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('home_id');
            $table->dropColumn('jobtitle');
            $table->dropColumn('phone');
            $table->dropColumn('cellphone');
            $table->dropColumn('active');
        });
    }
}
