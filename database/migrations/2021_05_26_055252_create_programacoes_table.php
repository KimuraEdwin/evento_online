<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacoes', function (Blueprint $table) {
            $table->id();
            $table->string('palestrante', 100);
            $table->string('funcao', 40);
            $table->string('tema', 50);
            $table->datetime('data_ini');
            $table->datetime('hora_ini');
            $table->datetime('data_fim');
            $table->datetime('hora_fim');
            $table->integer('duracao');
            $table->string('pdf', 150)->nullable();
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
        Schema::dropIfExists('programacoes');
    }
}
