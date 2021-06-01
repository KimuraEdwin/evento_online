<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_regs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cad_user_id');
            $table->string('token');
            $table->timestamps();

            $table->foreign('cad_user_id')->references('id')->on('cad_users');
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
        Schema::dropIfExists('cad_regs');
        Schema::enableForeignKeyConstraints();
    }
}
