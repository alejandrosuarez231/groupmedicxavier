@extends('layouts.app')

@section('toolbar')
<ul class="nav navbar-nav element-active-slate-400">
	<li class=""><a href="{{ route('promociones.create') }}"><i class="icon-box-add position-left"></i> Agregar una nueva promoción</a></li>
</ul>
@endsection

@section('content')

<div class="col-md-12">
	<div class="panel panel-flat no-border-radius border-top-primary">
		<div class="panel-heading">
			<h5 class="panel-title">Promociones Activas</h5>
		</div>
		<div class="panel-body no-padding">
			<table class="table">
				<thead>
					<tr>
						<th>Promoción</th>
						<th>Descripción</th>
						<th>Tipo</th>
						<th>Importante</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody id="tablePromociones">
					{{--
					@foreach ($promotions as $element)
					<tr>
						<td>{{ $element->title }}</td>
						<td>{{ $element->description }}</td>
						<td>{{ $element->type }}</td>
						<td>{{ ($element->summary) ? 'Si' : 'No' }}</td>
						<td>
							<ul class="icons-list pull-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{ route('promociones.edit', $element->id) }}"><i class="icon-pencil6"></i> Editar</a></li>
										<li class="divider"></li>
										<li><a href="#" onclick="deletePromotion({{ $element->id }})"><i class="icon-bin"></i> Eliminar</a></li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
					--}}
				</tbody>
			</table>
		</div>
	</div>
</div>

{!! Form::open(['route' => ['promociones.destroy', ':ID'], 'method' => 'DELETE', 'id' => 'deletePromotion']) !!}
{!! Form::close() !!}

@endsection

@push('js')

<script>
	var ruta_info = '{{ route('promociones.all') }}'
	var ruta_editar_promo = '{{ route('promociones.edit', ':ID') }}'
	var tableData

	$(function() {
		loadDataTable()
	});

	function destroyPromotion(id)
	{
		swal({
			title: '¿Esta seguro de eliminar este elemento?',
			text: "No podrá revertir esta acción!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#00838f',
			cancelButtonColor: 	'#ef5350',
			confirmButtonText: 	'Sí, estoy seguro!',
			cancelButtonText: 	'Cancelar!',
		}).then(function () {
			var form = $('#deletePromotion')
			$.ajax({
				url: form.attr('action').replace(':ID', id),
				type: form.attr('method'),
				dataType: 'json',
				data: form.serialize(),
			})
			.done(function(data) {
				loadDataTable()
			})
		})
	}

	function deletePromotion(id)
	{
		$.ajax({
			url: '{{ route('promociones.delete', ':ID') }}'.replace(':ID', id),
			dataType: 'json',
		})
		.done(function(data) {
			loadDataTable()
		})
	}

	function restorePromotion(id)
	{
		$.ajax({
			url: '{{ route('promociones.restore', ':ID') }}'.replace(':ID', id),
			dataType: 'json',
		})
		.done(function(data) {
			loadDataTable()
		})
	}

	function loadDataTable()
	{
		$.ajax({
			url: ruta_info,
			dataType: 'json',
		})
		.done(function(data) {
			tableData = ''
			var route_delete = '{{ route('promociones.delete', ':ID') }}'
			var route_restore = '{{ route('promociones.restore', ':ID') }}'
			var icon_eye
			$.each(data, function(index, val) {
				var habilitado = ''
				if (val.deleted_at != null) {
					habilitado = 'bg-danger'
				}
				tableData += '<tr class="'+habilitado+'">'
				tableData += '<td>'+val.title+'</td>'
				tableData += '<td>'+val.description+'</td>'
				tableData += '<td>'+val.type+'</td>'
				if (val.summary != null) {
					tableData += '<td>Si</td>'
				}else{
					tableData += '<td>No</td>'
				}
				tableData += '<td>'
				tableData += '<ul class="icons-list pull-right">'
				tableData += '<li class="dropdown">'
				tableData += '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>'
				tableData += '<ul class="dropdown-menu dropdown-menu-right">'
				tableData += '<li><a href="'+ruta_editar_promo.replace(':ID', val.id)+'"><i class="icon-pencil6"></i> Editar</a></li>'
				if (val.deleted_at != null) {
					tableData += '<li><a href="'+route_restore.replace(':ID', val.id)+'"><i class="icon-eye"></i> Habilitar</a></li>'
				}else{
					tableData += '<li><a href="'+route_delete.replace(':ID', val.id)+'"><i class="icon-eye-blocked"></i> Desabilitar</a></li>'
				}
				tableData += '<li class="divider"></li>'
				tableData += '<li><a href="#" onclick="destroyPromotion('+val.id+')"><i class="icon-bin"></i> Eliminar</a></li>'
				tableData += '</ul>'
				tableData += '</li>'
				tableData += '</ul>'
				tableData += '</td>'
				tableData += '</tr>'
			});
			$('#tablePromociones').html(tableData)
		})
		.fail(function(data) {
			console.log(data);
		})
	}

	function formReset()
	{
		$('form').resetear()
		$('#product_categorie_id').attr('disabled', true);
		$('#product_id').attr('disabled', true).html('');
		$('#category-div').addClass('hidden');
		$('#item-div').addClass('hidden');
		$('#summary').attr('disabled', true);
		$('#summary-div').addClass('hidden');
	}

</script>
@endpush