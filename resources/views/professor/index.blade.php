@extends("template.app")

@section("nome_tela", "Professor")

@section("cadastro")
	<form action="/professor" method="POST" class="row">
		<div class="form-group col-6">
			<label>Nome:</label>
			<input type="text" name="nome" value="{{ $professor->nome }}" class="form-control" />
		</div>
		<div class="form-group col-6">
			<label>E-mail:</label>
			<input type="email" name="email" value="{{ $professor->email }}" class="form-control" />
		</div>
		<div class="form-group col-4">
			<label>Matrícula:</label>
			<input type="number" name="matricula" value="{{ $professor->matricula }}" class="form-control" />
		</div>
		<div class="form-group col-4">
			<label>Titulação:</label>
			<select name="titulacao" class="form-control">
				<option value=""></option>
				@foreach ($titulacoes as $titulacao)
					@if ($titulacao->id == $professor->titulacao)
						<option value="{{ $titulacao->id }}" selected="selected">{{ $titulacao->nome }}</option>
					@else
						<option value="{{ $titulacao->id }}">{{ $titulacao->nome }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="form-group col-4">
			@csrf
			<input type="hidden" name="id" value="{{ $professor->id }}" />
			<button class="btn btn-success bottom" type="submit">
				<i class="fa fa-save"></i> Salvar
			</button>
			<a href="/professor" class="btn btn-primary bottom">
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
				<th>E-mail</th>
				<th>Matrícula</th>
				<th>Titulação</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($professores as $professor)
				<tr>
					<td>{{ $professor->nome }}</td>
					<td>{{ $professor->email }}</td>
					<td>{{ $professor->matricula }}</td>
					<td>{{ $professor->titulacao }}</td>
					<td>
						<a href="/professor/{{ $professor->id }}/edit" class="btn btn-warning">
							<i class="fa fa-edit"></i> Editar
						</a>
					</td>
					<td>
						<form action="/professor/{{ $professor->id }}" method="POST">
							@csrf
							<input type="hidden" name="_method" value="delete" />
							<button class="btn btn-danger" type="submit" onclick="return confirm('Deseja realmente excluir?');">
								<i class="fa fa-trash"></i> Excluir
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection