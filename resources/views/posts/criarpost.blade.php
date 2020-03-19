@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO SCRIPTS -->

<script src=" {{ asset('/vendor/tinymce/tinymce/tinymce.js') }}" referrerpolicy="origin"></script>

<script>

	$(document).ready(function(){

	//SCRIPT ABAIXO SERVE PARA UPLOAD DE IMAGENS
	document.getElementById("imagem").onchange = function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			document.getElementById("imgpreview").src = e.target.result;
		};
		reader.readAsDataURL(this.files[0]);
	};

});

</script>

<!-- BLOCO BOTÕES NO TOPO -->

<a type="submit" href="{{ url('posts') }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar para todos os posts</a>

<!-- BLOCO INFORMAÇÕES DO MEMBRO -->

<hr>

<h5>Criando novo post:</h5>

<div class="card bg-aeroblack mt-2">
	<div class="card-body">

		<form style="margin-block-end: 0px !important;" method="post" action="{{url('/membros/editar')}}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<input type="hidden" id="id" name="id" value="asd">

			<input type="hidden" id="rsbwordpressid" name="rsbwordpressid">

			<small><i class="text-warning fa fa-exclamation-circle" aria-hidden="true"></i> O editor abaixo NÃO salva o seu trabalho automáticamente. Você PERDERÁ o seu texto caso o navegador trave, ou a janela seja fechada. Você poderá salvar o texto como rascunho clicando no botão ao final do formulário.</small>

			<br><br>

			<small><i class="text-warning fa fa-exclamation-circle" aria-hidden="true"></i> A imagem destaque deve seguir rigorosamente o formato: JPG com 800 pixels de Largura e 400 pixels de altura.</small>

			<hr>

			<div class="form-group">
				<div class="form-row">

					<div class="col">
						<label for="name"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Título do post:</label>
						<input type="text" name="name" required id="name" class="form-control bg-aeroblack" placeholder="">
					</div>

					<div class="col">
						<label for="credencial">Categoria:</label>
						<select class="custom-select bg-aeroblack" id="credencial" name="credencial">
							<option value="0" selected>Notícias</option>
							<option value="1">Reportagem</option>
							<option value="2">Especial</option>
						</select>
					</div>	

				</div>
			</div>

			<div class="form-row">
				<div class="col">
					<img id="imgpreview" name="imgpreview" src="{{asset('public/images/assets/coverempty.jpg')}}" width="250" height="125" style="border-radius: 0.25rem; margin-right: 15px; float: left;" class="d-inline-block align-top" >
					<i class="text-primary fa fa-globe" aria-hidden="true"></i> Imagem destaque:<br>
					<small><input type="file" id="imagem" name="imagem" style="margin-top: 10px;" accept="image/*"  /></small><br>
					<small><div style="margin-top: 10px;">Tipo: JPG. Largura: 800px. Altura: 400px.</div></small>
				</div>
			</div>

			<hr>

			<button type="submit" class="btn btn-success bg-aeroblack">Salvar alterações</button>

		</form>

	</div>
</div>

@endsection