<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Professor;
use App\Models\Disciplina;
use App\Models\Titulacao;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$professor = new Professor();
		
		$professores = Professor::All();
						
		$titulacoes = Titulacao::All();
		
		$disciplinas = Disciplina::All();
		
        return view("professor.index", [
			"professor" => $professor,
			"professores" => $professores,
			"titulacoes" => $titulacoes,
			"disciplinas" => $disciplinas
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$validacao = $request->validate([
			"nome" => "required",
			"email" => "required|email",
			"matricula" => "required|numeric",
			"titulacao" => "required",
			"foto" => "image"
		], [
			"*.required" => "O [:attribute] deve ser obrigatório.",
			"foto.image" => "Deve ser salva uma imagem"
		]);
		
		if ($request->get("id") == "") {
			$professor = new Professor();
		} else {
			$professor = Professor::find($request->get("id"));
		}

		if ($request->file("foto") != "") {
			$professor->foto = $request->file("foto")->store("public");
			$professor->foto = explode("/", $professor->foto)[1];
		}
		
		$professor->nome = $request->get("nome");
		$professor->email = $request->get("email");
		$professor->matricula = $request->get("matricula");
		$professor->titulacao = $request->get("titulacao");
		$professor->save();
		
		$professor->listaDisciplinas()->detach();
		
		foreach ($request->get("disciplina") as $disciplina) {
			$professor->listaDisciplinas()->attach($disciplina);
		}
		
		$request->session()->flash("salvar", "Professor salvo com sucesso!");
		
		return redirect("/professor");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professores = Professor::All();
		
		$professor = Professor::find($id);
		
		$titulacoes = Titulacao::All();
		
		$disciplinas = Disciplina::All();
		
        return view("professor.index", [
			"professor" => $professor,
			"professores" => $professores,
			"titulacoes" => $titulacoes,
			"disciplinas" => $disciplinas
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
		$professor = Professor::Find($id);
		$professor->listaDisciplinas()->detach();
        Professor::destroy($id);
		$request->session()->flash("excluir", "Professor excluído com sucesso!");
		return redirect("/professor");
    }
}
