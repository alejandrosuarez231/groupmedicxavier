@extends('layouts.app')

@section('content')
<div class="col-md-6">
	<div class="panel panel-flat no-border-radius border-top-primary">
		<div class="panel-heading">
			<h5 class="panel-title">Listado de Clientes</h5>
		</div>

		<table class="table">
			<thead>
				<tr class="border-double">
					<th>Empresa / Cliente</th>
					<th>RUT</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Eugene</td>
					<td>Kopyov</td>
					<td class="text-right">
						<div class="btn-group">
							<button type="button" class="btn btn-xs border-primary text-primary-600 btn-flat btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="icon-menu7"></i>
							</button>

							<ul class="dropdown-menu no-border-radius dropdown-menu-right">
								<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="icon-vcard"></i> Ver Tarjeta</a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="icon-pencil6"></i> Editar</a></li>
								<li><a href="#"><i class="icon-bin"></i> Eliminar</a></li>
							</ul>
						</div>
					</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>
<div class="col-md-6">
	{!! Form::open(['route' => 'clientes.store', 'class' => 'form-horizontal']) !!}
	<div class="panel panel-flat no-border-radius border-top-primary">
		<div class="panel-heading">
			<h5 class="panel-title">Registro de Información de Clientes</h5>
		</div>

		<div class="panel-body">
			<fieldset>
				<legend class="text-semibold">
					<i class="icon-office position-left"></i>
					Información Básica
				</legend>
				<div class="form-group form-group-sm">
					{!! Form::label('nombre', 'Empresa / Cliente', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('rut', 'RUT', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::text('rut', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('giro', '', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::select('giro', [], null, ['class' => 'form-control']) !!}
					</div>
				</div>
			</fieldset>

			<fieldset class="text-semibold">
				<legend>
					<i class="icon-vcard position-left"></i>
					Información de Contacto
				</legend>

				<div class="form-group form-group-sm">
					{!! Form::label('sucursal', '', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::text('sucursal', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Sucursal Principal</label>
					<div class="col-lg-8">
						<label class="radio-inline">
							<input type="radio" class="styled" name="principal">
							Si
						</label>

						<label class="radio-inline">
							<input type="radio" class="styled" name="principal">
							No
						</label>
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('direccion', 'Dirección', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::text('direccion', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('tel', 'Teléfono', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::tel('tel', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('email', '', ['class' => 'col-lg-4 control-label']) !!}
					<div class="col-lg-8">
						{!! Form::email('email', null, ['class' => 'form-control']) !!}
					</div>
				</div>
			</fieldset>
		</div>

		<div class="panel-footer pt-10">
			<div class="form-group form-group-sm no-padding" style="padding-bottom: 10px">
				{!! Form::label('', '', ['class' => 'col-lg-4 control-label sr-only']) !!}
				<div class="col-lg-8">
					<button type="submit" class="btn border-slate text-slate-800 btn-block btn-flat">Guardar Información <i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">
					<i class="icon-vcard position-left"></i>
					Modal title
				</h4>
			</div>
			<div class="modal-body">
				<h6 class="text-semibold"><i class="icon-law position-left"></i> Información Básica</h6>
				<div class="well no-border-radius bg-slate-300">
					<dl class="dl-horizontal">
						<dt>Empresa / Cliente</dt>
						<dd>SC Informática RTLD</dd>
						<dt>RUT</dt>
						<dd>76.108.219 - 1</dd>
						<dt>Tipo / Categoria</dt>
						<dd>Educación</dd>
					</dl>
				</div>
				<h6 class="text-semibold"><i class="icon-law position-left"></i> Información de Contacto</h6>
				<div class="well no-border-radius bg-slate-300">
					<dl class="dl-horizontal">
						<dt>Dirección</dt>
						<dd>Portal del Sol Peñalolén. Pasaje Kuru 2260 Santiago de Chile, Chile</dd>
						<dt>Teléfono</dt>
						<dd>+56 2 2886 4200</dd>
						<dt>Email</dt>
						<dd>soporte@scinformatica.cl</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
	$(".styled").uniform({ radioClass: 'choice' });
</script>
@endpush