@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO BOTÕES NO TOPO -->

<a type="submit" href="{{ url('perfil/editar') }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-pencil"></i> Editar informações</a>

<a type="submit" href="{{ url('inicio/boasvindas') }}" class=" btn-sm btn-secondary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-hand-spock-o" aria-hidden="true"></i> Ver página de boas-vindas</a>

<!-- BLOCO INFORMAÇÕES DO MEMBRO -->

<hr>

<?php

if($perfil->credencial===0){
	$perfil->credencial='(0) Novato';
}else if($perfil->credencial===1){
	$perfil->credencial='(1) Conhecido';
}else if($perfil->credencial===2){
	$perfil->credencial='(2) Confiável';
}else if($perfil->credencial===3){
	$perfil->credencial='(3) Muito confiável';
} else if($perfil->credencial===8){
	$perfil->credencial='(8) Alienígena';
} else if($perfil->credencial===9){
	$perfil->credencial='(9) Moderador';
} else if($perfil->credencial===10){
	$perfil->credencial='(10) Administrador';
} else if($perfil->credencial===80){
	$perfil->credencial='(80) Bloqueado/Outros';
} else if($perfil->credencial===81){
	$perfil->credencial='(81) Bloqueado/Inatividade';
} else {
	$perfil->credencial='Erro';
}

if (empty($perfil->whatsapp)) {
	$perfil->whatsapp = 'Indefinido.';
}
if (empty($perfil->linkprojeto)) {
	$perfil->linkprojeto = 'Indefinido.';
}

if (empty($perfil->facebook)) {
	$perfil->facebook = 'Indefinido.';
}
if (empty($perfil->youtube)) {
	$perfil->youtube = 'Indefinido.';
}
if (empty($perfil->instagram)) {
	$perfil->instagram = 'Indefinido.';
}
if (empty($perfil->github)) {
	$perfil->github = 'Indefinido.';
}
if (empty($perfil->linkedin)) {
	$perfil->linkedin = 'Indefinido.';
}
if (empty($perfil->twitter)) {
	$perfil->twitter = 'Indefinido.';
}

?>

<h5>ID #{{$perfil->id}}.</h5>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Nome:</b> {{$perfil->name}}.<br>
<b> E-mail:</b> {{$perfil->email}}<br><br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Link do seu projeto:</b> {{$perfil->linkprojeto}}<br>
<b><i class="text-warning fa fa-lock" aria-hidden="true"></i> Whatsapp:</b> {{$perfil->whatsapp}}<br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Linkedin:</b> {{$perfil->linkedin}}<br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Facebook:</b> {{$perfil->facebook}}<br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Instagram:</b> {{$perfil->instagram}}<br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Youtube:</b> {{$perfil->youtube}}<br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Twitter:</b> {{$perfil->twitter}}<br>
<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> GitHub:</b> {{$perfil->github}}<br><br>

<b>Cadastrado em:</b> <?php if (!empty($perfil->created_at)){ echo date('d/m/y à\s H:i', strtotime($perfil->created_at)); } ?><br>
<b>Credencial:</b> {{$perfil->credencial}}.<br>

<hr>

<b><i class="text-primary fa fa-globe" aria-hidden="true"></i> Sobre:</b><br>{{$perfil->sobre}}<br>

@endsection