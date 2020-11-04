<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
	protected $table = "professor";
	
	public function objTitulacao() {
		return $this->hasOne("App\Models\Titulacao", "id", "titulacao");
	}
	
	public function listaDisciplinas() {
		
		return $this->belongsToMany("App\Models\Disciplina", "professor_disciplina", "professor", "disciplina");
		
	}
}
