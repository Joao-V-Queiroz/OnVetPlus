<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semens', function (Blueprint $table) {
            $table->id();
            $table->integer('registro');
            $table->string('nome', 50);
            $table->string('raca', 50);
            $table->string('central', 20);
            $table->string('tipos');

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
            
            $table->string('sangue', 20);
            $table->string('raca_2', 50);
            $table->string('partida', 50);
            $table->string('tec', 50);
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
        Schema::dropIfExists('semens');
    }
}
