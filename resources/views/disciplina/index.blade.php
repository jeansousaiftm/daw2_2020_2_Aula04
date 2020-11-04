@extends("template.app")

@section("nome_tela", "Disciplina")

@section("cadastro")
	<form action="/disciplina" method="POST" class="row">
		<div class="form-group col-6">
			<label>Nome:</label>
			<input type="text" name="nome" value="{{ $disciplina->nome }}" class="form-control" required />
		</div>
		<div class="form-group col-6">
			@csrf
			<input type="hidden" name="id" value="{{ $disciplina->id }}" />
			<button class="btn btn-success bottom" type="submit">
				<i class="fa fa-save"></i> Salvar
			</button>
			<a href="/disciplina" class="btn btn-primary bottom">
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
			@foreach ($disciplinas as $disciplina)
				<tr>
					<td>{{ $disciplina->nome }}</td>
					<td>
						<a href="/disciplina/{{ $disciplina->id }}/edit" class="btn btn-warning">
							<i class="fa fa-edit"></i> Editar
						</a>
					</td>
					<td>
						@if ($disciplina->listaProfessores()->count() == 0) 
							<form action="/disciplina/{{ $disciplina->id }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="delete" />
								<button class="btn btn-danger" type="submit" onclick="return confirm('Deseja realmente excluir?');">
									<i class="fa fa-trash"></i> Excluir
								</button>
							</form>
						@else
							Professor vinculado à essa disciplina!
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection