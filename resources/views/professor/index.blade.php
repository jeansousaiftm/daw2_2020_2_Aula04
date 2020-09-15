<!DOCTYPE html>

<html>
	<head>
		<title>Cadastro de Professores</title>
	</head>
	<body>
		<h1>Cadastro</h1>
		<form action="/professor" method="POST">
			<div>
				<label>Nome:</label>
				<input type="text" name="nome" value="{{ $professor->nome }}" />
			</div>
			<div>
				<label>E-mail:</label>
				<input type="email" name="email" value="{{ $professor->email }}" />
			</div>
			<div>
				<label>Matrícula:</label>
				<input type="number" name="matricula" value="{{ $professor->matricula }}" />
			</div>
			@csrf
			<input type="hidden" name="id" value="{{ $professor->id }}" />
			<button type="submit">Salvar</button>
			<a href="/professor">Novo</a>
		</form>
		<br/>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Matrícula</th>
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
						<td>
							<a href="/professor/{{ $professor->id }}/edit">Editar</a>
						</td>
						<td>
							<form action="/professor/{{ $professor->id }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="delete" />
								<button type="submit">Excluir</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>