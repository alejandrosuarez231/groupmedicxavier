@extends('layouts.app')

@push('css')
<style>
	.dl-horizontal dt
	{
		width: 30%;
	}
	.dl-horizontal dd
	{
		margin-left:35%;
	}
</style>
@endpush

@section('toolbar')
<ul class="nav navbar-nav element-active-slate-400">
	<li class="active"><a href="#clientes" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i>Clientes Registrados</a></li>
	<li><a href="#subcripciones" data-toggle="tab" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Subscripciones</a></li>
</ul>
@endsection

@section('content')


<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content no-border-radius">
			<div class="modal-header bg-teal" style="border-top-right-radius: 0px; border-top-left-radius: 0px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<dl class="dl-horizontal">
					<dt>Email:</dt>
					<dd id="email"></dd>

					<dt>Rut:</dt>
					<dd id="rut"></dd>

					<dt>Fono:</dt>
					<dd id="phone"></dd>

					<dt>Dirección:</dt>
					<dd id="address"></dd>

					<dt></dt>
					<dd></dd>
				</dl>
			</div>
			<div class="modal-footer border-top-teal pt-5 pb-5">
				<a id="trash" class="btn border-danger text-danger-800 btn-flat pull-left"><i class="icon-trash position-left"></i>Dar de baja</a>
				<a id="comprobarConvenio" class="btn border-teal text-teal-800 btn-flat hidden"></a>
			</div>
		</div>
	</div>
</div>

<div class="tabbable">
	<div class="tab-content">
		<div class="tab-pane fade active in" id="clientes">
			<div class="panel panel-white border-top-info no-border-radius">
				<div class="panel-heading">
					<h6 class="panel-title text-semibold">Clientes registrados</h6>
				</div>
				<table class="table table-hover datatable-responsive" id="users-table">
					<thead>
						<tr>
							<th>Cliente</th>
							<th>Email</th>
							<th>RUT</th>
							<th>Teléfono</th>
							<th>Convenio</th>
							<th>Fecha de Registro</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->name }} {{ $usuario->last_name }}</td>
							<td>{{ $usuario->email }}</td>
							<td>{{ $usuario->rut }}</td>
							<td>{{ $usuario->phone }}</td>
							<td>
								@if ($usuario->convenio)
								{!! ($usuario->verificado == 'si') ? '<span class="label label-primary">Comprobado</span>' : '<span class="label label-warning">Sin Comprobar</span>' !!}
								@else
								<span class="label label-default">No requerido</span>
								@endif
							</td>
							<td></td>
							<td>
								<a class="btn btn-default btn-xs no-border" href="#" data-toggle="modal" data-target="#modalDetalles"
								data-id="{{ $usuario->id }}"
								data-name="{{ $usuario->name.' '.$usuario->last_name }}"
								data-email="{{ $usuario->email }}"
								data-rut="{{ $usuario->rut }}"
								data-phone="{{ $usuario->phone }}"
								data-address="{{ $usuario->address }}"
								data-convenio="{{ $usuario->convenio }}"
								data-verificado="{{$usuario->verificado}}"
								><i class="icon-menu7"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane fade" id="subcripciones">
			<div class="panel panel-white border-top-info no-border-radius">
				<div class="panel-heading">
					<h6 class="panel-title text-semibold">Correos registrados en noticias</h6>
					
				</div>
				<table class="table table-hover" id="suscripciones-table">
					<thead>
						<tr>
							<th>Email</th>
							<th>Existe</th>
						</tr>
					</thead>
				</table>

				
			</div>
		</div>
	</div>
</div>
{!! Form::open(['id' => 'frmDelete', 'method' => 'DELETE']) !!}
{!! Form::close() !!}
@endsection

@push('js')
{!! Html::script('assets/js/plugins/tables/datatables/datatables.min.js') !!}
{!! Html::script('assets/js/plugins/tables/datatables/extensions/tools.min.js') !!}
<script>
	$(document).ready(function() {

		$('#comprobarConvenio').on('click', function(event) {
			event.preventDefault();
			$.ajax({
				url: $(this).attr('href'),
				dataType: 'json',
			})
			.done(function(data) {
				$('table').DataTable().ajax.reload()
				$('#modalDetalles').modal('hide')
			})
		});

		$('#trash').on('click', function(event) {
			event.preventDefault();
			var form = $('#frmDelete')
			var url = $(this).attr('href')
			var method = form.attr('method')

			swal({
				title: '¿Esta seguro de eliminar este elemento?',
				text: "No podrá revertir esta acción!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#00838f',
				cancelButtonColor: 	'#ef5350',
				confirmButtonText: 	'Sí, estoy seguro!',
				cancelButtonText: 	'Cancelar!',
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
				if (isConfirm) {
					$.ajax({
						url: url,
						type: method,
						dataType: 'json',
						data: form.serialize(),
					})
					.done(function(data) {
						console.log(data)
						$('table').DataTable().ajax.reload()
						$('#modalDetalles').modal('hide')
						swal({
							title: "Eliminado!",
							text: "Se elimnino satisfactoriamente el registro.",
							confirmButtonColor: "#66BB6A",
							type: "success"
						})

					});
				}
			});

		});

		$('#modalDetalles').on('show.bs.modal', function (event) {
			var url_convenio = '{{ route('siteUsers.convenio', ':ID') }}'
			var url_eliminar = '{{ route('siteUsers.destroy', ':ID') }}'
			var button = $(event.relatedTarget)
			var btn_convenio = $('#comprobarConvenio')
			var btn_delete = $('#trash')
			
			var id 			= button.data('id')
			var name 		= button.data('name')
			var email 		= button.data('email')
			var rut 		= button.data('rut')
			var phone 		= button.data('phone')
			var address 	= button.data('address')
			var convenio 	= button.data('convenio')
			var verificado 	= button.data('verificado')

			if (convenio == true) {
				btn_convenio.removeClass('hidden')
				if (verificado == 'si') {
					btn_convenio.html('<i class="icon-lock position-left"></i> Deshabilitar CM')
				}else{
					btn_convenio.html('<i class="icon-unlocked position-left"></i> Habilitar CM')
				}
				btn_convenio.attr('href', url_convenio.replace(':ID', id));
			}
			
			btn_delete.attr('href', url_eliminar.replace(':ID', id));

			var modal = $(this)
			modal.find('.modal-title').text(name)
			modal.find('.modal-body #email').html(email)
			modal.find('.modal-body #rut').html(rut)
			modal.find('.modal-body #phone').html(phone)
			modal.find('.modal-body #address').html(address)
		})

		$('#modalDetalles').on('hidden.bs.modal', function (e) {
			$('#comprobarConvenio').addClass('hidden')
		})

		$.extend( $.fn.dataTable.defaults, {
			autoWidth: false,
			responsive: true,
			columnDefs: [{ 
				orderable: false,
				width: '100px',
			}],
			dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
			language: {
				decimal: 		",",
				thousands: 		".",
				search: 		'<span>Filtrar:</span> _INPUT_',
				lengthMenu: 	'<span>Mostrar:</span> _MENU_',
				infoFiltered: 	'(filtrados de _MAX_ registros totales)',
				lengthMenu: 	'Mostrar _MENU_ registros por página',
				eroRecords: 	'No se encontraron registros - disculpe',
				info: 			'Mostrando pagina _PAGE_ de _PAGES_',
				infoEmpty: 		'Sin registros disponible',
				paginate: 		{ 
					'first': 'Primera',
					'last': 'Ultima',
					'next': '&rarr;',
					'previous': '&larr;'
				}
			},
			drawCallback: function () {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
			},
			preDrawCallback: function() {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
			}
		});

		

		var route_usuarios = '{!! route('siteUsers.all', 'usuarios') !!}'
		var route_suscripciones = '{!! route('siteUsers.all', 'suscripciones') !!}'
		var columns_usuarios
		var columns_suscripciones

		var table_usuarios = $('#users-table')
		var table_suscripciones = $('#suscripciones-table')
		columns_usuarios = [
		{ data: 'name', name: 'name' },
		{ data: 'email', name: 'email' },
		{ data: 'rut', name: 'rut' },
		{ data: 'phone', name: 'phone' },
		{ data: 'convenio', name: 'convenio' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'id', name: 'id', orderable: false, searchable: false},
		]

		columns_suscripciones = [
		{ data: 'newsEmail', name: 'newsEmail'},
		{ data: 'userEmail', name: 'userEmail'},
		]
		

		table_usuarios.DataTable({
			processing: true,
			serverSide: true,
			ajax: route_usuarios,
			columns: columns_usuarios,
			responsive: {
				details: {
					type: 'column'
				}
			},
			columnDefs: [
			{
				className: 'control',
				orderable: false,
				targets:   0
			},
			{ 
				width: "100px",
				targets: [5]
			},
			{ 
				orderable: false,
				targets: [5]
			}
			],
		});

		table_suscripciones.DataTable({
			processing: true,
			serverSide: true,
			ajax: route_suscripciones,
			columns: columns_suscripciones
		});
		
	});
</script>
@endpush