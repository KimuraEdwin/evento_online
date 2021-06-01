<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expositores', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 180);
            $table->string('logomarca', 100);
            $table->integer('tel');
            $table->string('email', 50)->unique();
            $table->text('descricao');
            $table->integer('cep');
            $table->string('logradouro', 100);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('estado', 3);
            $table->string('complemento', 200)->nullable();
            $table->string('linkSite', 120)->nullable();
            $table->string('linkWpp', 120)->nullable();
            $table->string('linkFacebook', 120)->nullable();
            $table->string('linkInstagram', 120)->nullable();
            $table->string('linkLinkedin', 120)->nullable();
            $table->string('catalogo_1', 200)->nullable();
            $table->string('catalogo_2', 200)->nullable();
            $table->string('catalogo_3', 200)->nullable();
            $table->string('catalogo_4', 200)->nullable();
            $table->string('catalogo_5', 200)->nullable();
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
        Schema::dropIfExists('expositores');
    }
}
