@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO BOTÕES NO TOPO -->
<!--
<a type="submit" href="{{ url('membros') }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar para todos os membros</a>
-->
<!-- BLOCO INFORMAÇÕES DO MEMBRO -->

<style type="text/css">
	
	.form-control:disabled, .form-control[readonly] {
		background-color: rgba(0, 0, 0, 0.4);
	}

</style>

<script>
	$( document ).ready(function() {
		$('#confirmpassword').on('keyup', function(e){
			if($("#password").val().length > 0){
			}else{
				$('#confirmpassword').val('')
			}
		});
		$('#password').on('keyup', function(e){
			if($("#password").val().length > 0){
			}else{
				$('#confirmpassword').val('')
			}
		});        
	});

</script>

<h5>Editando perfil:</h5>

<div class="card bg-aeroblack mt-2">
	<div class="card-body">

		<small>Por questões de segurança, os membros não podem trocar seus e-mails cadastrados por conta própria. Caso você queira trocar, entre em contato com os administradores.</small>

		<hr>

		<form style="margin-block-end: 0px !important;" method="post" action="{{url('/perfil/editar')}}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<input type="hidden" id="id" name="id" value="{{$perfil->id}}">

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="name">Nome:</label>
						<input type="text" name="name" required id="name" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->name}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="password">Nova senha:</label>
						<input type="password" name="password" id="password" class="form-control bg-aeroblack" placeholder="" value="">
					</div>
					<div class="col">
						<label for="confirmpassword">Repetir nova senha:</label>
						<input type="password" name="confirmpassword" id="confirmpassword"  class="form-control bg-aeroblack" placeholder="" value="">
					</div>
				</div>
				<small>Caso não deseje alterar a senha, apenas deixe o campo em branco.</small>

			</div>

			<div class="form-group">
				<label for="sobre">Sobre:</label>
				<textarea class="form-control bg-aeroblack" id="sobre" name="sobre" rows="5">{{$perfil->sobre}}</textarea>
				<small>HTML é permitido, porém, por favor, não exagere. Textos com formatação simples quase sempre são melhores opções.</small>
			</div>

			<hr>

			<button type="submit" class="btn btn-success bg-aeroblack">Salvar alterações</button>

		</form>

	</div>
</div>

@endsection