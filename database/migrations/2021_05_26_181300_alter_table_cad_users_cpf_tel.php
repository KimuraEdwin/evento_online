<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCadUsersCpfTel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cad_users', function(Blueprint $table){
            $table->bigInteger('cpf')->change();
            $table->bigInteger('tel')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cad_users', function(Blueprint $table){
            $table->integer('tel')->change();
            $table->integer('cpf')->change();
        });
    }
}
