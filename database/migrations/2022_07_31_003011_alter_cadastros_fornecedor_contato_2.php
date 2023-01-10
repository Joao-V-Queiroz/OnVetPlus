<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCadastrosFornecedorContato2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedor_contato', function (Blueprint $table) {
            $table->string('telefone', 20)->nullable()->change();
            $table->string('nome', 50)->nullable()->change();
            $table->string('email')->nullable()->change();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedor_contato', function (Blueprint $table) {
            $table->string('telefone', 20)->nullable(false)->change();
            $table->string('nome', 50)->nullable(false)->change();
            $table->string('email')->nullable(false)->change(); ;            
        });
    }
}