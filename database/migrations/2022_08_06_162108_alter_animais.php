<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAnimais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animais', function (Blueprint $table) {
            $table->string('video')->nullable()->change();
            $table->dropColumn('imagem_id');
            $table->string('imagem')->nullable()->after('video');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animais', function (Blueprint $table) {
            $table->string('video')->nullable(false)->change();
            $table->dropColumn('imagem');
            $table->integer('imagem_id')->after('video');
        });
    }
}
