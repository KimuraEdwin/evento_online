<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEventoRegsForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento_regs', function(Blueprint $table){
            $table->foreignId('evento_id')->after('id');
            $table->foreignId('cad_user_id')->after('id');

            $table->foreign('evento_id')->references('id')->on('eventos');
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
        Schema::table('evento_regs', function(Blueprint $table){
            $table->dropForeign(['cad_user_id']);
            $table->dropForeign(['evento_id']);
        });
    }
}
