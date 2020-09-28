<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitulacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professor', function (Blueprint $table) {
            $table->unsignedBigInteger("titulacao");
			// campo na tabela prof - campo na tabela titulacao - nome da tabela
			$table->foreign("titulacao")->references("id")->on("titulacao");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professor', function (Blueprint $table) {
            //
        });
    }
}
