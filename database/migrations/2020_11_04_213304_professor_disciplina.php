<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfessorDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_disciplina', function (Blueprint $table) {
			$table->unsignedBigInteger("professor");
			$table->unsignedBigInteger("disciplina");
			$table->foreign("professor")->references("id")->on("professor");
			$table->foreign("disciplina")->references("id")->on("disciplina");
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_disciplina');
    }
}
