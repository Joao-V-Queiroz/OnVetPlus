<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastrosFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 20)->nullable();
            $table->string('cnpj', 20)->nullable();
            $table->string('razao', 50);
            $table->string('tipo', 20);
            $table->string('email')->nullable();  
            $table->string('telefone', 20);
            $table->string('cep', 10);
            $table->string('endereco', 100);
            $table->string('numero', 50);
            $table->string('complemento', 100);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('uf', 2);            
            $table->tinyInteger('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedor');
    }
}