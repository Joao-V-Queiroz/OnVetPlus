<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->longText('desc');

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
        Schema::dropIfExists('tes');
    }
}