<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
	
	protected $table = "disciplina";
	
	public function listaProfessores() {
		
		return $this->belongsToMany("App\Models\Professor", "professor_disciplina", "disciplina", "professor");
		
	}
	
}
