@extends("template.app")

@section("nome_tela", "Professor")

@section("cadastro")
	<form action="/professor" method="POST" class="row" enctype="multipart/form-data">
		<div class="form-group col-3">
			<label>Nome:</label>
			<input type="text" name="nome" value="{{ $professor->nome }}" class="form-control" required />
		</div>
		<div class="form-group col-3">
			<label>E-mail:</label>
			<input type="email" name="email" value="{{ $professor->email }}" class="form-control" required />
		</div>
		<div class="form-group col-3">
			<label>Matrícula:</label>
			<input type="number" name="matricula" value="{{ $professor->matricula }}" class="form-control" required />
		</div>
		<div class="form-group col-3">
			<label>Titulação:</label>
			<select name="titulacao" class="form-control" required>
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
			<label>Disciplinas:</label>
			<select id="disciplina" name="disciplina[]" class="form-control" required multiple>
				@foreach ($disciplinas as $disciplina)
					@if ($professor->listaDisciplinas()->where("id", $disciplina->id)->count() > 0)
						<option value="{{ $disciplina->id }}" selected="selected">{{ $disciplina->nome }}</option>
					@else
						<option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="form-group col-5">
			<label>Foto:</label>
			<input type="file" name="foto" class="form-control" />
		</div>
		<div class="form-group col-3">
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
	
	<script>
		$(document).ready(function() {
			$("#disciplina").selectpicker("refresh")
		});
	</script>
@endsection

@section("listagem")
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Matrícula</th>
				<th>Titulação</th>
				<th>Disciplinas</th>
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
					<td>{{ $professor->objTitulacao->nome }}</td>
					<td>
						<ul>
							@foreach ($professor->listaDisciplinas as $disciplina)
								<li>{{ $disciplina->nome }}</li>
							@endforeach
						</ul>
					</td>
					<td>
						@if ($professor->foto != "")
							<img src="{{ asset('storage/' . $professor->foto) }}" width="100" />
						@else
							Sem foto!
						@endif
					</td>
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