@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO BOTÕES NO TOPO -->

<a type="submit" href="{{ url('perfil/editar') }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-pencil"></i> Editar informações</a>

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

?>

<h5>ID #{{$perfil->id}}.</h5>
<b>Nome:</b> {{$perfil->name}}.<br>
<b>E-mail:</b> {{$perfil->email}}<br>
<b>Cadastrado em:</b> <?php if (!empty($perfil->created_at)){ echo date('d/m/y à\s H:i', strtotime($perfil->created_at)); } ?><br>
<b>Credencial:</b> {{$perfil->credencial}}.<br>

<hr>

<b>Sobre:</b><br>{{$perfil->sobre}}<br>

@endsection