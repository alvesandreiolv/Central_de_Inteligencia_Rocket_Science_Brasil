@extends('layouts/dashboardmaster')

@section('contentdashboard')

<!-- BLOCO BOTÕES NO TOPO -->

<a type="submit" href="{{ url('membros') }}" class=" btn-sm btn-primary bg-aeroblack mr-1" style=" text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar para todos os membros</a>

<!-- BLOCO INFORMAÇÕES DO MEMBRO -->

<hr>

<h5>Editando o link ID #{{$vermembro->id}}</h5>

<div class="card bg-aeroblack mt-2">
	<div class="card-body">

		<form style="margin-block-end: 0px !important;" method="post" action="{{url('/membros/editar')}}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<input type="hidden" id="id" name="id" value="{{$vermembro->id}}">

			<input type="hidden" id="rsbwordpressid" name="rsbwordpressid" value="{{$vermembro->rsbwordpressid}}">

			<small>Administrador, cuidado! Mesmo que insira informações erradas ou equivocadas, o sistema não te impedirá de salvá-las.</small>
			<br>
			<small>Os campos que possuem o <i class="text-warning fa fa-lock" aria-hidden="true"></i> cadeado, são informações privadas, portanto, não serão divulgadas em nossos canais.</small>
			<hr>

			<div class="form-row">
				<div class="col">
					<a href="https://br.gravatar.com/"><img src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $vermembro->email ) ) )}}?s=200&d=mm&r=g " width="100" height="100" style="border-radius: 0.25rem; margin-right: 15px; float: left;" class="d-inline-block align-top"></a>

					<!--<a target="blank" style="text-decoration: none;" class="text-warning" href="https://br.gravatar.com/">Mudar imagem no Gravatar</a><br>-->
					Imagem de perfil:<br>
					<i class="text-primary fa fa-globe" aria-hidden="true"></i>
				</div>
				<div class="col">
					<small>Para trocar a  imagem de perfil, o membro precisa ter uma conta no site <a target="blank" class="text-warning" style="text-decoration: none;" href="https://br.gravatar.com/">Gravatar</a>. A conta no <a target="blank" class="text-warning" style="text-decoration: none;" href="https://br.gravatar.com/">Gravatar</a> precisa ter exatamente o mesmo e-mail que está cadastrado aqui.</small>
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="name"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Nome:</label>
						<input type="text" name="name" required id="name" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->name}}">
					</div>
					<div class="col">
						<label for="email"><i class="text-primary fa fa-globe" aria-hidden="true"></i> E-mail:</label>
						<input type="email" name="email" required id="email" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->email}}">
						<small>Mudar o e-mail de um membro pode quebrar a integridade do sistema e causar bugs. Prossiga apenas se você souber o que está fazendo!</small>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="linkprojeto"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Link do projeto:</label>
						<input type="url" name="linkprojeto" id="linkprojeto" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->linkprojeto}}">
					</div>
					<div class="col">
						<label for="whatsapp"><i class="text-warning fa fa-lock" aria-hidden="true"></i> Whatsapp:</label>
						<input type="number" name="whatsapp" id="whatsapp" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->whatsapp}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="linkedin"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Linkedin:</label>
						<input type="url" name="linkedin" id="linkedin" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->linkedin}}">
					</div>
					<div class="col">
						<label for="facebook"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Facebook:</label>
						<input type="url" name="facebook" id="facebook" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->facebook}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="instagram"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Instagram:</label>
						<input type="url" name="instagram" id="instagram" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->instagram}}">
					</div>
					<div class="col">
						<label for="youtube"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Youtube:</label>
						<input type="url" name="youtube" id="youtube" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->youtube}}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="twitter"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Twitter:</label>
						<input type="url" name="twitter" id="twitter" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->twitter}}">
					</div>
					<div class="col">
						<label for="github"><i class="text-primary fa fa-globe" aria-hidden="true"></i> GitHub:</label>
						<input type="url" name="github" id="github" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->github}}">
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
						<label for="credencial">Credencial:</label>
						<select class="custom-select bg-aeroblack" id="credencial" name="credencial">
							<option <?php if ($vermembro->credencial===0) { echo 'selected'; } ?> value="0">(0) Novato</option>
							<option <?php if ($vermembro->credencial===1) { echo 'selected'; } ?> value="1">(1) Conhecido</option>
							<option <?php if ($vermembro->credencial===2) { echo 'selected'; } ?> value="2">(2) Confiável</option>
							<option <?php if ($vermembro->credencial===3) { echo 'selected'; } ?> value="3">(3) Muito confiável</option>
							<option <?php if ($vermembro->credencial===8) { echo 'selected'; } ?> value="8">(8) Alienígena</option>
							<option <?php if ($vermembro->credencial===9) { echo 'selected'; } ?> value="9">(9) Moderador</option>
							<option <?php if ($vermembro->credencial===10) { echo 'selected'; } ?> value="10">(10) Administrador</option>
							<option <?php if ($vermembro->credencial===80) { echo 'selected'; } ?> value="80">(80) Bloqueado/Outros</option>
							<option <?php if ($vermembro->credencial===81) { echo 'selected'; } ?> value="81">(81) Bloqueado/Inatividade</option>
						</select>
					</div>	
				</div>
			</div>

			<div class="form-group">
				<label for="sobre"><i class="text-primary fa fa-globe" aria-hidden="true"></i> Sobre:</label>
				<textarea class="form-control bg-aeroblack" id="sobre" name="sobre" rows="5">{{$vermembro->sobre}}</textarea>
				<small>HTML é permitido, porém, por favor, não exagere. Textos com formatação simples quase sempre são melhores opções.</small>
			</div>

			<hr>

			<button type="submit" class="btn btn-success bg-aeroblack">Salvar alterações</button>

		</form>

	</div>
</div>

@endsection