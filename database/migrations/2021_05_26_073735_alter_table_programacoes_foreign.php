<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProgramacoesForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programacoes', function(Blueprint $table){
            $table->foreignId('evento_id')->after('id');
            $table->foreignId('expositores_id')->after('id');

            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('expositores_id')->references('id')->on('expositores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programacoes', function(Blueprint $table){
            $table->dropForeign(['expositores_id']);
            $table->dropForeign(['evento_id']);
        });
    }
}
