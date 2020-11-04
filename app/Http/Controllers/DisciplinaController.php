<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplina = new Disciplina();
		$disciplinas = Disciplina::All();
		return view("disciplina.index", [
			"disciplina" => $disciplina,
			"disciplinas" => $disciplinas
		]);
    }

    public function store(Request $request)
    {
        $validacao = $request->validate([
			"nome" => "required"
		], [
			"*.required" => "O [:attribute] deve ser obrigatório."
		]);
		
        if ($request->get("id") == "") {
			$disciplina = new Disciplina();
		} else {
			$disciplina = Disciplina::find($request->get("id"));
		}
		
		$disciplina->nome = $request->get("nome");
		$disciplina->save();
		
		$request->session()->flash("salvar", "Disciplina salva com sucesso!");
		
		return redirect("/disciplina");
    }

    public function edit($id)
    {
        $disciplina = Disciplina::find($id);
		$disciplinas = Disciplina::All();
		return view("disciplina.index", [
			"disciplina" => $disciplina,
			"disciplinas" => $disciplinas
		]);
    }

    public function destroy($id)
    {
        Disciplina::destroy($id);
		$request->session()->flash("excluir", "Disciplina excluída com sucesso");
		return redirect("/disciplina");
    }
}
