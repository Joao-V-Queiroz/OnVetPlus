<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCadastrosFornecedores extends Migration
{
   
    public function up()
    {
        Schema::table('fornecedor', function (Blueprint $table) {
            $table->string('razao', 50)->nullable()->change();
            $table->string('telefone', 20)->nullable()->change();
            $table->string('complemento', 100)->nullable()->change();
           
        });
    }
    
    public function down()
    {
        Schema::table('fornecedor', function (Blueprint $table) {
            $table->string('razao', 50)->nullable(false)->change();
            $table->string('telefone', 20)->nullable(false)->change();
            $table->string('complemento', 100)->nullable(false)->change();
        });
    }
}