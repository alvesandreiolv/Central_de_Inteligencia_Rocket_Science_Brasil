@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO LINKS ABAIXO -->

<script>
	function adicionarlink() {
		var link = prompt("Insira o ID do link que deseja adicionar ao projeto:", "Ex: 1000");
		if ((link != null) && (link != 'Ex: 1000')) {
			window.location.replace("empregos/adicionarlink?linkid="+link);
		}
	}
</script>

<hr>

{{$membros->appends(\Request::except('_token'))->render()}}

<button type="button" class="btn-sm btn-outline-light mb-3" disabled><i class="fa fa-user-circle-o" aria-hidden="true"></i> Todos os membros:</button>

<table class="table bg-aeroblack table-sm" style="margin-bottom: 0px; cursor: pointer; border-radius: 0.25rem;">

	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nome</th>
			<th scope="col">E-mail</th>
			<th scope="col">Credencial</th>
			<th scope="col">Cadastrado em</th>
			<th scope="col">Editar/Deletar</th>
		</tr>
	</thead>

	<tbody>

		@if(count($membros) > 0)

		@foreach($membros as $membros)

		<?php

		if($membros->credencial===0){
			$membros->credencial='(0) Novato';
		}else if($membros->credencial===1){
			$membros->credencial='(1) Conhecido';
		}else if($membros->credencial===2){
			$membros->credencial='(2) Confiável';
		}else if($membros->credencial===3){
			$membros->credencial='(3) Muito confiável';
		} else if($membros->credencial===8){
			$membros->credencial='(8) Alienígena';
		} else if($membros->credencial===9){
			$membros->credencial='(9) Moderador';
			$corlinha = 'background-color: rgba(255, 255, 0, 0.2);';
		} else if($membros->credencial===10){
			$membros->credencial='(10) Administrador';
			$corlinha = 'background-color: rgba(255, 0, 255, 0.2);';
		} else if($membros->credencial===80){
			$membros->credencial='(80) Bloqueado/Outros';
			$corlinha = 'background-color: rgba(255, 0, 0, 0.2);';
		} else if($membros->credencial===81){
			$membros->credencial='(81) Bloqueado/Inatividade';
			$corlinha = 'background-color: rgba(255, 0, 0, 0.2);';
		} else {
			$membros->credencial='Erro';
			$corlinha = 'background-color: rgba(255, 0, 0, 0.2);';
		}

		?>

		<tr class="personaltableaeroblack1 clicaveltabela">

			<td style="{{$corlinha ?? '' }}"><a href="{{ url('membros/ver?id='.$membros->id ) }}"><b>#{{$membros->id}}</b></a ></td>
			<td style="{{$corlinha ?? '' }}"><a href="{{ url('membros/ver?id='.$membros->id ) }}">{{$membros->name}}</a></td>
			<td style="{{$corlinha ?? '' }}"><a href="{{ url('membros/ver?id='.$membros->id ) }}">{{$membros->email}}</a></td>
			<td style="{{$corlinha ?? '' }}"><a href="{{ url('membros/ver?id='.$membros->id ) }}">{{$membros->credencial}}</a></td>
			<td style="{{$corlinha ?? '' }}"><a href="{{ url('membros/ver?id='.$membros->id ) }}"><?php if (!empty($membros->created_at)){ echo date('d/m/y à\s H:i', strtotime($membros->created_at)); } ?></a></td>

			<td style="{{$corlinha ?? '' }}">
				<a href="{{ url('membros/editar?id='.$membros->id) }}" class="btn btn-primary btn-sm bg-aeroblack"><i aria-hidden="true" class="fa fa-pencil"></i></a>
				<a href="{{ url('membros/bloquear?id='.$membros->id) }}" onclick="return confirm('Deseja bloquear o membro &quot;{{$membros->name}}&quot;?');" class="btn btn-danger btn-sm bg-aeroblack"><i class="fa fa-ban" aria-hidden="true"></i></a>
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