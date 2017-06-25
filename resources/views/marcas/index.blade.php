@extends('layouts.app')

@section('toolbar')

<ul class="nav navbar-nav element-active-slate-400">
	<li class=""><a href="{{ route('user.create') }}"><i class="icon-user-plus position-left"></i> Agregar un nuevo usuario</a></li>
</ul> 
@endsection

@section('content')

<div class="panel no-border-radius no-border-top">
	<ul class="nav nav-tabs nav-tabs-top nav-justified">
		<li class="active">
			<a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab" aria-expanded="true">
				<i class="fa fa-users fa-lg position-left"></i> Lista de Marcas
			</a>
		</li>

		<li class="">
			<a href="#messages-mon" class="text-size-small text-uppercase" data-toggle="tab" aria-expanded="false">
				<i class="fa fa-search fa-lg position-left"></i> Auditoria
			</a>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade active p-20 in" id="messages-tue">
			@include('user.elements.listUser')
		</div>

		<div class="tab-pane fade" id="messages-mon">
			@include('user.elements.auditUser')
		</div>

	</div>
	@foreach ($marcas as $element)
		<div>
			{{ $element->nombre }}
		</div>
	@endforeach
</div>

{!! Form::open(['id' => 'formDelete', 'method' => 'DELETE']) !!}
{!! Form::close() !!}
@endsection

 @push('js')
{!! Html::script('assets/js/plugins/notifications/jgrowl.min.js') !!}
{!! Html::script('assets/js/plugins/tables/datatables/datatables.min.js') !!}
{!! Html::script('assets/js/plugins/tables/datatables/extensions/tools.min.js') !!}
<script>
	$(document).ready(function() {

		$.extend($.fn.dataTable.defaults, {
			dom: '<"datatable-header"fl><"datatable-basic"t><"datatable-footer"ip>',
			"scrollCollapse": false,
			responsive: {
				details: {
					type: 'column'
				}
			},
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
			
		});

		var route = '{!! route('user.all') !!}'
		var columns
		var table = $('#users-table')
		columns = [
		{ data: 'name', name: 'name' },
		{ data: 'description', name: 'description' },
		{ data: 'email', name: 'email' },
		{ data: 'id', name: 'id', orderable: false, searchable: false},
		]
		

		table.DataTable({
			processing: true,
			serverSide: true,
			ajax: route,
			columns: columns
		});
	});

	function deleteUser(id)
	{
		var form = $('#formDelete')
		$.ajax({
			url: '{{ route('user.destroy', ':ID') }}'.replace(':ID', id),
			type: form.attr('method'),
			dataType: 'json',
			data: form.serialize(),
		})
		.done(function(data) {
			$('table').DataTable().ajax.reload()
			$.jGrowl(data.message, {
				header: data.title,
				theme: 'bg-info-400'
			});
		})
		
	}
</script>
@endpush