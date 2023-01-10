<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbrioes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embrioes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('tipo', 20);
            $table->string('congelamento', 50);
            $table->string('grau', 50);
            
            $table->bigInteger('animal_id')->nullable()->unsigned();
            $table->foreign('animal_id')->nullable()->unsigned()
                ->references('id')
                ->on('animais');
            ;

            $table->bigInteger('animais_id')->nullable()->unsigned();
            $table->foreign('animais_id')->nullable()->unsigned()
                ->references('id')
                ->on('animais');
            ;
            $table->text('observacao')->nullable();
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
        Schema::dropIfExists('embrioes');
    }
}
