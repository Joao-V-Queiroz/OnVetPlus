<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInducoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inducoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->longText('desc');
            $table->string('dt_prt', 20);
            $table->integer('dias_lactacao');
            //chave estrangeira
            $table->bigInteger('animal_id')->nullable()->unsigned();
            $table->foreign('animal_id')->nullable()->unsigned()
                ->references('id')
                ->on('animais');
            ;

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
        Schema::dropIfExists('inducoes');
    }
}