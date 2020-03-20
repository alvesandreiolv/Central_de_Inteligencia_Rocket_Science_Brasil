@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO SCRIPTS -->

<script src=" {{ asset('/vendor/tinymce/tinymce/tinymce.js') }}" referrerpolicy="origin"></script>

<script>

	$(document).ready(function(){

		//SCRIPT ABAIXO SERVE PARA O EDITOR DE TEXTO
		tinymce.init({
			selector: '#textocompleto',
			plugins: "image",
			menubar: 'favs file edit view insert format tools table help',
			image_uploadtab: true,
			paste_data_images : true,
			images_upload_handler: function (blobInfo, success, failure) {
				success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
			}
		});

		//SCRIPT ABAIXO SERVE PARA UPLOAD DE IMAGENS
		document.getElementById("imagem_destaque").onchange = function () {
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

		<form style="margin-block-end: 0px !important;" method="post" action="{{url('/posts/criarpost')}}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<input type="hidden" id="id" name="id" value="asd">

			<input type="hidden" id="rsbwordpressid" name="rsbwordpressid">

			<small><i class="text-warning fa fa-exclamation-circle" aria-hidden="true"></i> O editor abaixo NÃO salva o seu trabalho automáticamente. Você PERDERÁ o seu texto caso o navegador trave, ou a janela seja fechada. Você poderá salvar o texto como rascunho clicando no botão ao final do formulário.</small>

			<br><br>

			<small><i class="text-warning fa fa-exclamation-circle" aria-hidden="true"></i> A imagem destaque deve seguir rigorosamente o padrão: JPG ou JPEG com 800 pixels de Largura e 400 pixels de altura.</small>

			<hr>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="titulo">Título do post:</label>
						<input minlength="10" maxlength="100" type="text" name="titulo" required id="titulo" class="form-control bg-aeroblack" placeholder="" value="{{ $dados['titulo'] ?? '' }}">
					</div>
					<div class="col">
						<label for="categoria">Categoria:</label>
						<select class="custom-select bg-aeroblack" id="categoria" name="categoria">
							<option value="4" <?php if (isset($dados['categoria'])) { if ($dados['categoria'] == 4) { echo 'selected'; } } else {	echo 'selected'; }  ?> >Notícias</option>
							<option value="2" <?php if ((isset($dados['categoria'])) && ($dados['categoria'] == 2)) { echo 'selected'; } ?> >Reportagem</option>
							<option value="267" <?php if ((isset($dados['categoria'])) && ($dados['categoria'] == 267)) { echo 'selected'; } ?> >Especial</option>
						</select>
					</div>	
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<img id="imgpreview" name="imgpreview" src="{{asset('public/images/assets/coverempty.jpg')}}" width="250" height="125" style="border-radius: 0.25rem; margin-right: 15px; float: left;" class="d-inline-block align-top" >
						Imagem destaque:<br>
						<small><input type="file" id="imagem_destaque" name="imagem_destaque" style="margin-top: 10px;" accept=".jpg, .jpeg"  /></small><br>
						<small><div style="margin-top: 10px;">Tipo: JPG ou JPEG. Largura: 800px. Altura: 400px.</div></small>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="textocompleto">Texto completo:</label>
						<textarea class="form-control bg-aeroblack" id="textocompleto" name="textocompleto" rows="15">{{ $dados['textocompleto'] ?? '' }}</textarea>
					</div>
				</div>
			</div>

			<hr>

			<button type="submit" class="btn btn-success bg-aeroblack">Publicar agora</button>
			<!--<button type="submit" class="btn btn-info bg-aeroblack">Enviar para análise</button>-->
			<button type="submit" class="btn btn-warning bg-aeroblack">Salvar como rascunho</button>

		</form>

	</div>
</div>

@endsection