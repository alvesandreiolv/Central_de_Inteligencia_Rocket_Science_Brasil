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

		<small>Por questão de integridade do sistema, os membros não podem trocar seus e-mails cadastrados por conta própria.</small>
		<br>
		<small>Os campos que possuem o <i class="text-warning fa fa-lock" aria-hidden="true"></i> cadeado, são informações privadas, portanto, não serão divulgadas em nossos canais.</small>

		<hr>
		
		<div class="form-row">
			<div class="col">
				<a href="https://br.gravatar.com/"><img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $perfil->email ) ) )}}?s=200&d=mm&r=g " width="100" height="100" style="border-radius: 0.25rem; margin-right: 15px; float: left;" class="d-inline-block align-top"></a> <a target="blank" style="text-decoration: none;" class="text-warning" href="https://br.gravatar.com/">Mudar imagem no Gravatar</a><br><i class="text-primary fa fa-globe" aria-hidden="true"></i>
			</div>
			<div class="col">
				<small>Para trocar a sua imagem de perfil, você precisa ter uma conta no site <a target="blank" class="text-warning" style="text-decoration: none;" href="https://br.gravatar.com/">Gravatar</a>. A sua conta no <a target="blank" class="text-warning" style="text-decoration: none;" href="https://br.gravatar.com/">Gravatar</a> precisa ter exatamente o mesmo e-mail que está cadastrado aqui.</small>
			</div>
		</div>
		<hr>

		<form style="margin-block-end: 0px !important;" method="post" action="{{url('/perfil/editar')}}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="name"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Nome completo:</label>
						<input type="text" name="name" required id="name" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->name}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="linkprojeto"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Link do seu projeto:</label>
						<input type="url" name="linkprojeto" id="linkprojeto" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->linkprojeto}}">
					</div>
					<div class="col">
						<label for="whatsapp"><i class="text-warning fa fa-lock" aria-hidden="true"></i> Whatsapp:</label>
						<input type="number" name="whatsapp" id="whatsapp" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->whatsapp}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="linkedin"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Linkedin:</label>
						<input type="url" name="linkedin" id="linkedin" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->linkedin}}">
					</div>
					<div class="col">
						<label for="facebook"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Facebook:</label>
						<input type="url" name="facebook" id="facebook" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->facebook}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="instagram"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Instagram:</label>
						<input type="url" name="instagram" id="instagram" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->instagram}}">
					</div>
					<div class="col">
						<label for="youtube"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Youtube:</label>
						<input type="url" name="youtube" id="youtube" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->youtube}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="twitter"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Twitter:</label>
						<input type="url" name="twitter" id="twitter" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->twitter}}">
					</div>
					<div class="col">
						<label for="github"><i class="text-primary fa fa-globe" aria-hidden="true"></i> GitHub:</label>
						<input type="url" name="github" id="github" class="form-control bg-aeroblack" placeholder="" value="{{$perfil->github}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="password"><i class="text-warning fa fa-lock" aria-hidden="true"></i> Nova senha:</label>
						<input type="password" name="password" id="password" class="form-control bg-aeroblack" placeholder="" value="">
					</div>
					<div class="col">
						<label for="confirmpassword"><i class="text-warning fa fa-lock" aria-hidden="true"></i> Repetir nova senha:</label>
						<input type="password" name="confirmpassword" id="confirmpassword"  class="form-control bg-aeroblack" placeholder="" value="">
					</div>
				</div>
				<small>Caso não deseje alterar a senha, apenas deixe o campo em branco.</small>

			</div>

			<div class="form-group">
				<label for="sobre"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Sobre:</label>
				<textarea class="form-control bg-aeroblack" id="sobre" minlength="15" name="sobre" rows="5" placeholder="Caso você deixe este campo vazio, colocaremos para você a descrição 'Entusiasta de Astronomia e Astronáutica'. ">{{$perfil->sobre}}</textarea>
				<small>HTML é permitido, porém, por favor, não exagere. Textos com formatação simples quase sempre são melhores opções.</small>
			</div>

			<hr>

			<button type="submit" class="btn btn-success bg-aeroblack">Salvar alterações</button>

		</form>

	</div>
</div>

@endsection