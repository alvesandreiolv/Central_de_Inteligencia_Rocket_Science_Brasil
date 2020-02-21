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

			<small>Cuidado ao manipular as informações abaixo. Apenas administradores podem acessar este painel, portanto, mesmo que você insira informações equivocadas ou incompletas, o sistema não te impedirá de salvá-las.</small>

			<hr>

			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="name">Nome:</label>
						<input type="text" name="name" required id="name" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->name}}">
					</div>
					<div class="col">
						<label for="email">E-mail:</label>
						<input type="email" name="email" required id="email" class="form-control bg-aeroblack" placeholder="" value="{{$vermembro->email}}">
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
				<label for="sobre">Sobre:</label>
				<textarea class="form-control bg-aeroblack" id="sobre" name="sobre" rows="5">{{$vermembro->sobre}}</textarea>
				<small>HTML é permitido, porém, por favor, não exagere. Textos com formatação simples quase sempre são melhores opções.</small>
			</div>

			<hr>

			<button type="submit" class="btn btn-success bg-aeroblack">Salvar alterações</button>

		</form>

	</div>
</div>

@endsection