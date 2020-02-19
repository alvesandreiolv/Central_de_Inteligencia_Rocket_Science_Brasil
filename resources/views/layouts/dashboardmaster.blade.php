<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('public/jquery/jquery.js') }}"></script>
<script src="{{ asset('public/personal/js/app.js') }}"></script>
<script src="{{ asset('public/bootstrapaero/js/bootstrap.js') }}"></script>

<!-- Styles -->
<link href="{{ asset('public/personal/css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/bootstrapaero/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('public/font-awesome-4.7.0/css/font-awesome.css') }}">

<link rel="shortcut icon" href="{{ asset('public/images/assets/favicon1.png') }}">

</head>

<body style="padding-top:50px; padding-bottom: 70px;">

<div class="container">

<div class="row">

<div class="col-lg-3">

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

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if (Route::current()->uri() === '/') { echo 'active'; } ?>" href="{{ url('') }}"><i class="fa fa-home" aria-hidden="true"></i> Início</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('projetos')) || (Request::is('projetos/*')) ) { echo 'active'; } ?>" href="{{ url('projetos') }}"><i class="fa fa-line-chart" aria-hidden="true"></i> Projetos</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('empregos')) || (Request::is('empregos/*')) ) { echo 'active'; } ?>" href="{{ url('empregos') }}"><i class="fa fa-suitcase" aria-hidden="true"></i> Empregos</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('concursos')) || (Request::is('concursos/*')) ) { echo 'active'; } ?>" href="{{ url('concursos') }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Concursos</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('estudos')) || (Request::is('estudos/*')) ) { echo 'active'; } ?>" href="{{ url('estudos') }}"><i class="fa fa-book" aria-hidden="true"></i> Estudos</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('musicas')) || (Request::is('musicas/*')) ) { echo 'active'; } ?>" href="{{ url('musicas') }}"><i class="fa fa-music" aria-hidden="true"></i>
Músicas</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('doutrinas')) || (Request::is('doutrinas/*')) ) { echo 'active'; } ?>" href="{{ url('doutrinas') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Doutrinas</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('teorias')) || (Request::is('teorias/*')) ) { echo 'active'; } ?>" href="{{ url('teorias') }}"><i class="fa fa-commenting-o" aria-hidden="true"></i> Teorias</a>

<a style="width: 100%;" class="nav-link text-white bg-aeroblack <?php if ( (Request::is('links')) || (Request::is('links/*')) ) { echo 'active'; } ?>" href="{{ url('links') }}"><i class="fa fa-external-link" aria-hidden="true"></i> Links</a>

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
echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-home" aria-hidden="true"></i> Início</a></li>';
}

//CONCURSOS ABAIXO

if (Route::current()->uri() === 'concursos') {
echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-check-square-o" aria-hidden="true"></i> Concursos</a></li>';
}
if (Route::current()->uri() === 'concursos/cadastrarconcurso') {
echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/concursos").'"><i class="fa fa-check-square-o" aria-hidden="true"></i> Concursos</a></li>';
echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-plus"></i> Cadastrar concurso</a></li>';
} 
if (Route::current()->uri() === 'concursos/editarconcurso') {
echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/concursos").'"><i class="fa fa-check-square-o" aria-hidden="true"></i> Concursos</a></li>';
echo '<li class="nav-item"><a class="nav-link bg-aeroblack active" href=""><i class="fa fa-pencil"></i> Editar concurso</a></li>';
} 
if (Route::current()->uri() === 'concursos/verconcurso') {
echo '<li class="nav-item"><a class="nav-link bg-aeroblack" href="'.url("/concursos").'"><i class="fa fa-check-square-o" aria-hidden="true"></i> Concursos</a></li>';
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
