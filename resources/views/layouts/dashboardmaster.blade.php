<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--<title>{{ config('app.name', 'Laravel') }}</title>-->
	<title>Central de Inteligência Rocket Science Brasil</title>

	<!-- Scripts -->
	<script src="{{ asset('public/jquery/jquery.js') }}"></script>
	<script src="{{ asset('public/personal/js/app.js') }}"></script>
	<script src="{{ asset('public/bootstrapaero/js/bootstrap.js') }}"></script>

	<!-- Styles -->
	<link href="{{ asset('public/personal/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/bootstrapaero/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('public/font-awesome-4.7.0/css/font-awesome.css') }}">

	<link rel="shortcut icon" href="{{ asset('public/images/assets/centralfavcon.png') }}">

</head>

<body style=" padding-bottom: 70px;">

	<!-- BLOCO NAV -->

	<nav class="navbar navbar-expand-md navbar-dark bg-aeroblack mb-4 ">
		<div class="container">

			<img src="{{asset('public/images/assets/centrallogo.png')}}" width="60" height="60" style="float: left; margin-right: 10px;" class="d-inline-block align-top">

			<div class="site-branding-text"><h1 class="site-title h3 mb-0"><a href="https://rocketsciencebr.com/" rel="home" class="navbar-brand mb-0">Central de Inteligência RSB</a></h1><span class="site-description">Comunidade brasileira de entusiastas em Astronomia e Astronáutica.</span></div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav ml-auto">

					<li class="nav-item ">
						<a class="nav-link" href="https://rocketsciencebr.com/"><i class="fa fa-globe" aria-hidden="true"></i> Ver website</a>
					</li>

					<!--
					<li class="nav-item">
						<a class="nav-link <?php if (Route::current()->uri() === '/inicio') { echo 'active'; } ?>" href="{{ route('login') }}"><i class="fa fa-home" aria-hidden="true"></i> Central</a>
					</li>
				-->

				@if (Route::has('login'))

				@auth



				@else
				<li class="nav-item">
					<a class="nav-link <?php if (Route::current()->uri() === 'login') { echo 'active'; } ?>" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
				</li>

				@if (Route::has('register'))
					<!--
					<li class="nav-item">
						<a class="nav-link <?php if (Route::current()->uri() === 'register') { echo 'active'; } ?>" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar</a>
					</li>
				-->
				@endif

				@endauth

				@endif

				@auth
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
				</li>
				@endauth

			</ul>
		</div>

	</div>
</nav>

<!-- BLOCO CORPO PAGINA -->

<div class="container">

	<div class="row">

		<div class="col-lg-3" id="sidebarmaster">

			<div class="list-group" style="padding-bottom:15px;">

				<div class="card text-white bg-aeroblack">

					<div class="card-body">

						<!-- BLOCO INFOS ESPECIAIS ABAIXO -->

						<div class="card text-white bg-aeroblack" style="width: 100%;margin-bottom:10px;">

							<div class="card-body">

								<img class="user__img" src="{{ asset('public/images/assets/squareexample1.png') }}" alt="" style="width: 3rem; height: 3rem; border-radius: 50%; margin-right: .8rem; float: left;">

								<div style="float: left; margin-top: .2rem;">

									<div style="font-weight: 600; font-size: .9rem;">

										<?php
//$nfdashboard = Auth::user()->name; 
//$nfdashboard = explode(' ', $nfdashboard, 3);
// echo $nfdashboard[0].' '.$nfdashboard[1];
										echo 'Ney';
										?>

									</div>

									<div style="font-size: .7rem;">neyelson@gmail.com</div>

								</div>

							</div>

						</div>

						<!-- BLOCO INFOS ESPECIAIS ACIMA -->

						<a id="shmenulinks" class="nav-link" style="border-radius: 0.25rem; cursor: pointer; width: 100%;" data-toggle="collapse" aria-expanded="true" aria-controls="menulinks" data-target="#menulinks"><i class="fa fa-bars" aria-hidden="true"></i> Abrir/Fechar menu</a>

						<div id="menulinks" class="nav nav-pills collapse">

							<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if (Route::current()->uri() === 'inicio') { echo 'active'; } ?>" href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Início</a>

							<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if (Route::current()->uri() === 'logs') { echo 'active'; } ?>" href="{{ url('logs') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Logs</a>

							<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if (Route::current()->uri() === 'administrador') { echo 'active'; } ?>" href="{{ url('administrador') }}"><i class="fa fa-star" aria-hidden="true"></i> Administrador</a>

							<a style="width: 100%;" class="nav-link text-white bg-aeroblack" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>
								{{ __('Logout') }}
							</a>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div id="conteudo" class="col-lg-9">

			<div class="tab-content" id="v-pills-tabContent">

				<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-home-tab">

					<ul class="nav nav-tabs ">

						<?php



						if (Route::current()->uri() === '/') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-home" aria-hidden="true"></i> Faça parte</a></li>';
						}

						if (Route::current()->uri() === 'inicio') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-home" aria-hidden="true"></i> Início</a></li>';
						}

//ADMINISTRADOR ABAIXO

						if (Route::current()->uri() === 'administrador') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-star" aria-hidden="true"></i> Administrador</a></li>';
						}
						if (Route::current()->uri() === 'administrador/cadastrarconcurso') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/administrador").'"><i class="fa fa-check-square-o" aria-hidden="true"></i> Administrador</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar concurso</a></li>';
						} 
						if (Route::current()->uri() === 'administrador/editarconcurso') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/administrador").'"><i class="fa fa-check-square-o" aria-hidden="true"></i> Administrador</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar concurso</a></li>';
						} 
						if (Route::current()->uri() === 'administrador/verconcurso') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/administrador").'"><i class="fa fa-check-square-o" aria-hidden="true"></i> Administrador</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver concurso</a></li>';
						} 

//EMPREGOS ABAIXO

						if (Route::current()->uri() === 'empregos') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-suitcase" aria-hidden="true"></i> Empregos</a></li>';
						}
						if (Route::current()->uri() === 'empregos/addaplicacao') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/empregos").'"><i class="fa fa-suitcase" aria-hidden="true"></i> Empregos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Adicionar aplicação</a></li>';
						} 
						if (Route::current()->uri() === 'empregos/veraplicacao') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/empregos").'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Empregos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver aplicação</a></li>';
						}
						if (Route::current()->uri() === 'empregos/editaraplicacao') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/empregos").'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Empregos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar aplicação</a></li>';
						} 

//MÚSICAS ABAIXO

						if (Route::current()->uri() === 'musicas') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-music" aria-hidden="true"></i> Músicas</a></li>';
						}
						if (Route::current()->uri() === 'musicas/cadastrarmusica') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/musicas").'"><i class="fa fa-music" aria-hidden="true"></i> Músicas</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar música</a></li>';
						} 
						if (Route::current()->uri() === 'musicas/editarmusica') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/musicas").'"><i class="fa fa-music" aria-hidden="true"></i> Músicas</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar música</a></li>';
						} 
						if (Route::current()->uri() === 'musicas/editarmensagem') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/musicas").'"><i class="fa fa-music" aria-hidden="true"></i> Músicas</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar mensagem</a></li>';
						} 

//ESTUDOS ABAIXO

						if (Route::current()->uri() === 'estudos') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
						}
						if (Route::current()->uri() === 'estudos/cadastrarprova') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/estudos").'"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar prova</a></li>';
						} 
						if (Route::current()->uri() === 'estudos/editarprova') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/estudos").'"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar prova</a></li>';
						} 
						if (Route::current()->uri() === 'estudos/verprova') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/estudos").'"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver prova</a></li>';
						} 
						if (Route::current()->uri() === 'estudos/cadastrarquestao') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/estudos").'"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar questão</a></li>';
						} 
						if (Route::current()->uri() === 'estudos/verquestao') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/estudos").'"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver questão</a></li>';
						} 
						if (Route::current()->uri() === 'estudos/editarquestao') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/estudos").'"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar questão</a></li>';
						} 


//DOUTRINAS ABAIXO

						if (Route::current()->uri() === 'doutrinas') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Doutrinas</a></li>';
						}
						if (Route::current()->uri() === 'doutrinas/criar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/doutrinas").'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Doutrinas</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Criar doutrina</a></li>';
						} 
						if (Route::current()->uri() === 'doutrinas/ver') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/doutrinas").'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Doutrinas</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver doutrina</a></li>';
						}
						if (Route::current()->uri() === 'doutrinas/editar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/doutrinas").'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Doutrinas</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar doutrina</a></li>';
						} 

//LINKS ABAIXO

						if (Route::current()->uri() === 'links') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-external-link" aria-hidden="true"></i> Links</a></li>';
						}
						if (Route::current()->uri() === 'links/cadastrarlink') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/links").'"><i class="fa fa-external-link" aria-hidden="true"></i> Links</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar link</a></li>';
						}
						if (Route::current()->uri() === 'links/editarlink') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/links").'"><i class="fa fa-commenting-o" aria-hidden="true"></i> Links</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i></i> Editar teoria</a></li>';
						} 



//TEORIAS ABAIXO

						if (Route::current()->uri() === 'teorias') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-commenting-o" aria-hidden="true"></i> Teorias</a></li>';
						}
						if (Route::current()->uri() === 'teorias/criar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/teorias").'"><i class="fa fa-commenting-o" aria-hidden="true"></i> Teorias</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Criar teoria</a></li>';
						}
						if (Route::current()->uri() === 'teorias/ver') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/teorias").'"><i class="fa fa-commenting-o" aria-hidden="true"></i> Teorias</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver teoria</a></li>';
						} 
						if (Route::current()->uri() === 'teorias/editar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/teorias").'"><i class="fa fa-commenting-o" aria-hidden="true"></i> Teorias</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i></i> Editar teoria</a></li>';
						} 
						if (Route::current()->uri() === 'teorias/pesquisar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href="'.url("/teorias").'"><i class="fa fa-commenting-o" aria-hidden="true"></i> Teorias</a></li>';
						} 

//PROJETOS ABAIXO

						if (Route::current()->uri() === 'projetos') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
						}
						if (Route::current()->uri() === 'projetos/criar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar projeto</a></li>';
						}
						if (Route::current()->uri() === 'projetos/ver') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver projeto</a></li>';
						} 
						if (Route::current()->uri() === 'projetos/editar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i></i> Editar projeto</a></li>';
						} 
						if (Route::current()->uri() === 'projetos/pesquisar') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
						} 
						if (Route::current()->uri() === 'projetos/criartarefa') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Criar tarefa</a></li>';
						}
						if (Route::current()->uri() === 'projetos/vertarefa') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-eye"></i> Ver tarefa</a></li>';
						}
						if (Route::current()->uri() === 'projetos/editartarefa') {
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/projetos").'"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a></li>';
							echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i></i> Editar tarefa</a></li>';
						}  

						?>

					</ul>

					<div class="card text-white bg-aeroblack" style="width: 100%; border-top-left-radius: 0px;">

						<div class="card-body">

							@yield('contentdashboard')

						</div>

					</div>

				</div>

			</div>

<!--
<br>
<span class="text-white"><center>{{ date('Y') }} - github.com/Neyelson</center></span>
<br>
-->

</div>

</div>

</div>

</body>

</html>
