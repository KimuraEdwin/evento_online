<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('cpf');
            $table->integer('tel');
            $table->integer('cep');
            $table->string('logradouro', 100);
            $table->integer('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('estado', 3);
            $table->string('complemento', 200)->nullable();
            $table->string('campo_1')->nullable();
            $table->string('campo_2')->nullable();
            $table->string('campo_3')->nullable();
            $table->string('campo_4')->nullable();
            $table->string('campo_5')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cad_users');
        Schema::enableForeignKeyConstraints();
    }
}
