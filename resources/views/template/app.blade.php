<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - @yield("nome_tela")</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/fa.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}" />
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
		<script src="{{ asset('js/bootstrap-select.js') }}"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="/"><b>Home</b></a></li>
				<li class="nav-item"><a class="nav-link" href="/professor">Professor</a></li>
				<li class="nav-item"><a class="nav-link" href="/titulacao">Titulação</a></li>
				<li class="nav-item"><a class="nav-link" href="/disciplina">Disciplina</a></li>
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
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $e)
						<li>{{ $e }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		@if (!request()->is("/"))
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
		@else
			<div class="container" style="text-align: center;">
				<br/>
				<br/>
				<br/>
				<h1>Cadastro Acadêmico</h1>
				<!--<img src="{{ asset('storage/teste/user.jpg') }}" />-->
			</div>
		@endif

	</body>
</html>