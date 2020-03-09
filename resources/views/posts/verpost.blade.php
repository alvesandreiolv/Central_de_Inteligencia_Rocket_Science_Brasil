@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO INFORMAÇÕES GERAIS ABAIXO -->

<style type="text/css">
	
	.wp-block-image img {
		max-width: 100%;
	}

</style>

<?php



?>

<h4>{{ $verpost->post_title }}</h4>
<div class="row">

	<div class="col">

		<b>ID:</b> #{{$verpost->ID}}<br>
		<b>Autor do post:</b> {{$verpost->post_author}}<br>
		<b>Criado em:</b> {{date('d/m/y à\s H:i', strtotime($verpost->post_date))}}<br>
		<b>Status:</b> {{$verpost->post_status}}<br>

	</div>

</div>

<hr>

<!-- BLOCO CORPO TEXTO ABAIXO -->

<?php
echo $verpost->post_content;
?>

@endsection