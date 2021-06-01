<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerencias', function (Blueprint $table) {
            $table->id();
            $table->integer('cpf');
            $table->string('cnpj')->nullable();
            $table->string('cod_ger')->nullable();
            $table->string('empresa', 100);
            $table->string('nome_usuario', 100);
            $table->integer('tel');
            $table->string('email', 100)->unique();
            $table->integer('cep');
            $table->string('logradouro', 100);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('estado', 3);
            $table->string('complemento', 200)->nullable();
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
        Schema::dropIfExists('gerencias');
    }
}
