@extends("template.app")

@section("nome_tela", "Titulação")

@section("cadastro")
	<form action="/titulacao" method="POST" class="row">
		<div class="form-group col-6">
			<label>Nome:</label>
			<input type="text" name="nome" value="{{ $titulacao->nome }}" class="form-control" required />
		</div>
		<div class="form-group col-6">
			@csrf
			<input type="hidden" name="id" value="{{ $titulacao->id }}" />
			<button class="btn btn-success bottom" type="submit">
				<i class="fa fa-save"></i> Salvar
			</button>
			<a href="/titulacao" class="btn btn-primary bottom">
				<i class="fa fa-plus"></i> Novo
			</a>
		</div>
	</form>
@endsection

@section("listagem")
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($titulacoes as $titulacao)
				<tr>
					<td>{{ $titulacao->nome }}</td>
					<td>
						<a href="/titulacao/{{ $titulacao->id }}/edit" class="btn btn-warning">
							<i class="fa fa-edit"></i> Editar
						</a>
					</td>
					<td>
						@if ($titulacao->qtd_professores == 0) 
							<form action="/titulacao/{{ $titulacao->id }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="delete" />
								<button class="btn btn-danger" type="submit" onclick="return confirm('Deseja realmente excluir?');">
									<i class="fa fa-trash"></i> Excluir
								</button>
							</form>
						@else
							Professor vinculado à essa titulação
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection