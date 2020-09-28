<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - @yield("nome_tela")</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/fa.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="/"><b>Home</b></a></li>
				<li class="nav-item"><a class="nav-link" href="/professor">Professor</a></li>
				<li class="nav-item"><a class="nav-link" href="/titulacao">Titulação</a></li>
			</ul>
		</nav>
		@if (Session::has("salvar"))
			<div class="alert alert-success">
				{{ Session::get("salvar") }}
			</div>
		@endif
		@if (Session::has("excluir"))
			<div class="alert alert-danger">
				{{ Session::get("excluir") }}
			</div>
		@endif
		<div class="container">
			<h1>Cadastro - @yield("nome_tela")</h1>
			<div class="cadastro">
				@yield("cadastro")
			</div>
			<h1>Listagem - @yield("nome_tela")</h1>
			<div class="listagem">
				@yield("listagem")
			</div>
		</div>
	</body>
</html>