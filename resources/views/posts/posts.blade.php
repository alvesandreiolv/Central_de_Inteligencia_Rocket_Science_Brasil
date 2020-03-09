@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO INFORMAÇÕES GERAIS ABAIXO -->

<h4>Todos os posts:</h4>
<div class="row">

	<div class="col">

		<b>Posts online:</b> 10<br>
		<b>Aguardando aprovação:</b> 10<br>
		<b>Cancelados:</b> 10<br>

	</div>

</div>

<!-- BLOCO LINKS PESQUISA ABAIXO -->

<hr>

<form class="mb-3 " method="get" action="{{url('/links')}}">

	<?php if (empty($_GET["por"])) { $_GET["por"]='nome'; } ?>

	Pesquisar por:
	<div class="input-group mb-1 ">
		<div class="form-check mr-2 ">
			<input class="form-check-input " type="radio" name="por" id="pesquisarid" value="id" <?php if ($_GET["por"] =='id') { echo 'checked'; } ?> >
			<label class="form-check-label" for="pesquisarid">
				ID
			</label>
		</div>
		<div class="form-check mr-2">
			<input class="form-check-input" type="radio" name="por" id="pesquisarnome" value="nome" <?php if ($_GET["por"] =='nome') { echo 'checked'; } ?> >
			<label class="form-check-label" for="pesquisarnome">
				Nome
			</label>
		</div>
		<div class="form-check mr-2">
			<input class="form-check-input" type="radio" name="por" id="pesquisarurl" value="url" <?php if ($_GET["por"] =='url') { echo 'checked'; } ?> >
			<label class="form-check-label" for="pesquisarurl">
				URL
			</label>
		</div>
		<div class="form-check mr-2">
			<input class="form-check-input" type="radio" name="por" id="pesquisarnome" value="categoria" <?php if ($_GET["por"] =='pesquisarcategoria') { echo 'checked'; } ?> >
			<label class="form-check-label" for="pesquisarcategoria">
				Categoria
			</label>
		</div>
		<div class="form-check mr-2">
			<input class="form-check-input" type="radio" name="por" id="pesquisarnome" value="relevancia" <?php if ($_GET["por"] =='pesquisarrelevancia') { echo 'checked'; } ?> >
			<label class="form-check-label" for="pesquisarrelevancia">
				Relevância
			</label>
		</div>
	</div>

	<div class="input-group">

		@if (!empty($_GET["input"])) 
		<a class="btn btn-default" href="links" style="color:rgba(255, 0, 0, 0.4)!important; border-top-right-radius: 0px; overflow: hidden; border-bottom-right-radius: 0px; border: 1px solid rgba(0, 0, 0, 0.2); border-right: 0px; text-decoration: none;">
			<i class="fa fa-ban"></i>
		</a>
		@endif

		<input id="barrapesquisa" class="form-control bg-aeroblack" type="text" name="input" placeholder="Pesquisar por <?php echo strtoupper($_GET["por"]); ?>" aria-label="Search" value="{{$_GET['input'] ?? ''}}" autofocus>
		<span class="input-group-btn" >
			<button class="btn btn-default" type="submit" style="color:rgba(0, 0, 0, 0.4)!important; border-top-left-radius: 0px; border-bottom-left-radius: 0px; border: 1px solid rgba(0, 0, 0, 0.2); border-left: 0px;">
				<i class="fa fa-search"></i>
			</button>
		</span>
	</div>

</form>

<!-- BLOCO LINKS ABAIXO -->

{{ $posts->appends(\Request::except('_token'))->render() }}

<table class="table bg-aeroblack" style="margin-bottom: 0px; cursor: pointer; border-radius: 0.25rem;">

	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Status</th>
			<th>Autor</th>
			<th>Criado em</th>
			<th>Editar/Deletar</th>
		</tr>
	</thead>

	<button type="button" class="btn-sm btn-outline-light mb-3" disabled><i class="fa fa-suitcase" aria-hidden="true"></i> Meus posts:</button>
	<a type="button" href="links/cadastrarlink" class=" btn-primary btn-sm bg-aeroblack ml-1" style="text-decoration: none;"><i class="fa fa-plus"></i> Criar post</a>

	<tbody>

		@if(count($posts) > 0)

		@foreach($posts as $posts)

		<tr class="personaltableaeroblack1 clicaveltabela">

			<td ><a href="{{$posts->ID}}" target="blank"><b>#{{$posts->ID}}</b></a ></td>
			<td ><a href="{{$posts->ID}}" target="blank">{{$posts->post_title}}</a></td>
			<td ><a href="{{$posts->ID}}" target="blank">{{$posts->post_status}}</a></td>
			<td ><a href="{{$posts->ID}}" target="blank">{{$posts->post_author}}</a></td>
			<td ><a href="{{$posts->ID}}" target="blank"><?php if (!empty($posts->post_date)){ echo date('d/m/y à\s H:i', strtotime($posts->post_date)); } ?></a></td>
			<td >
				<a href="{{ url('links/editarlink?id='.$posts->ID) }}" class="btn btn-primary btn-sm bg-aeroblack"><i aria-hidden="true" class="fa fa-pencil"></i></a>
				<a href="{{ url('links/deletarlink?id='.$posts->ID) }}" onclick="return confirm('Deseja deletar a doutrina &quot;pppppppppppppppppppppppp&quot;?');" class="btn btn-danger btn-sm bg-aeroblack"><i aria-hidden="true" class="fa fa-trash"></i></a>
			</td>
		</tr>

		@endforeach
		@else

		<tr class="personaltableaeroblack1">
			<td></td>
			<td>Sem resultados para mostrar</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		@endif

	</tbody>

</table>

@endsection