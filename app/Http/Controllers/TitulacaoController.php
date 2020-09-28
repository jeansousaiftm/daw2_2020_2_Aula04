<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulacao;

class TitulacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulacao = new Titulacao();
		$titulacoes = Titulacao::All();
		return view("titulacao.index", [
			"titulacao" => $titulacao,
			"titulacoes" => $titulacoes
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
        if ($request->get("id") == "") {
			$titulacao = new Titulacao();
		} else {
			$titulacao = Titulacao::find($request->get("id"));
		}
		
		$titulacao->nome = $request->get("nome");
		$titulacao->save();
		
		$request->session()->flash("salvar", "Titulação salva com sucesso!");
		
		return redirect("/titulacao");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulacao = Titulacao::find($id);
		$titulacoes = Titulacao::All();
		return view("titulacao.index", [
			"titulacao" => $titulacao,
			"titulacoes" => $titulacoes
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
        Titulacao::destroy($id);
		$request->session()->flash("excluir", "Titulação excluída com sucesso");
		return redirect("/titulacao");
    }
}
