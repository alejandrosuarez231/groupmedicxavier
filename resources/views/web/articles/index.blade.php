@extends('layouts.app')

@section('aditionalOptions')
<div class="heading-elements">
	<div class="heading-btn-group">
		<a data-toggle="modal" data-target="#mdArticlePlus" class="btn btn-link btn-float"><i class="icon-cube4"></i><span>Artículo</span></a>
		<a data-toggle="modal" data-target="#mdCategoriePlus" class="btn btn-link btn-float"><i class="icon-price-tags2"></i> <span>Categoria</span></a>
		<a data-toggle="modal" data-target="#mdSupplierPlus" class="btn btn-link btn-float"><i class="icon-store"></i> <span>Proveedor</span></a>
	</div>
</div>
<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
@endsection

@section('toolbar')
<ul class="nav navbar-nav element-active-slate-400">
	<li class="active"><a href="#article" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i>Artículos</a></li>
	<li><a href="#categories" data-toggle="tab" aria-expanded="true"><i class="icon-calendar3 position-left"></i>Categorias</a></li>
	<li><a href="#suppliers" data-toggle="tab"><i class="icon-cog3 position-left"></i> Proveedores</a></li>
</ul>
@endsection

@section('content')
<div class="tabbable">
	<div class="tab-content">
		<div class="tab-pane fade active in" id="article">
			@include('web.articles.elements.tableArticles')
		</div>
		<div class="tab-pane fade" id="categories">
			@include('web.articles.elements.tableCategories')
		</div>
		<div class="tab-pane fade" id="suppliers">
			@include('web.articles.elements.tableSuppliers')
		</div>		
	</div>
</div>

@include('web.articles.elements.modalArticleCreate')
@include('web.articles.elements.modalCategorieCreate')
@include('web.articles.elements.modalSupplierCreate')


{!! Form::open(['id' => 'formDelete', 'method' => 'DELETE']) !!}
{!! Form::close() !!}


@endsection

@push('js')
{!! Html::script('assets/js/plugins/uploaders/fileinput.min.js') !!}
{!! Html::script('assets/js/plugins/media/fancybox.min.js') !!}

{!! Html::script('assets/js/plugins/media/fancybox.min.js') !!}
{!! Html::script('assets/js/plugins/tables/datatables/datatables.min.js') !!}
{!! Html::script('assets/js/plugins/tables/datatables/extensions/tools.min.js') !!}


{!! Html::script('assets/js/plugins/notifications/pnotify.min.js') !!}
{!! Html::script('assets/js/plugins/notifications/noty.min.js') !!}
{!! Html::script('assets/js/plugins/notifications/jgrowl.min.js') !!}

{!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}

{{--
{!! JsValidator::formRequest('Cpanel\Http\Requests\ArticleStoreRequest', '#frmAddArticle') !!}
{!! JsValidator::formRequest('Cpanel\Http\Requests\articlesCategorieStoreRequest', '#frmCategorie') !!}
{!! JsValidator::formRequest('Cpanel\Http\Requests\ArticleSupplierStoreRequest', '#frmSupplier') !!}
--}}

<script>

	$(document).ready(function() {
		var notes = [];
		
		$("input[name=especial]").on('change', function() {
		    if( $(this).is(':checked') ) {
				$('#mercado_publico_id').attr('disabled', false)
		    }else{
				$('#mercado_publico_id').attr('disabled', true)
		    }
		});

		$('[data-popup="lightbox"]').fancybox({
			padding: 		3,
			opacity: 		true,
			showNavArrows: 	true
		});

		$.extend( $.fn.dataTable.defaults, {
			dom: '<"datatable-header"fl><"datatable-basic"t><"datatable-footer"ip>',
			/*autoWidth: false,
			responsive: true,
			scrollY: 350,*/
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

		fillTables(1)
		fillTables(2)
		fillTables(3)

		// Cargar Formulario Articulo
		$('form').submit(function(event) {
			event.preventDefault()
			formSend($(this))
		});

	    // Cuando el modal se oculte debemos resetear los valores del formulario
	    $('.modal').on('hide.bs.modal', function (e) {
	    	$(this).find('form')[0].reset();
	    	$('#frmAddArticle').attr('action', '{{ route('articulos.store') }}').attr('method', 'POST');
	    	$('#frmCategorie').attr('action', '{{ route('web.articles.categories.store') }}').attr('method', 'POST');
	    	$('#frmSupplier').attr('action', '{{ route('web.articles.supplier.store') }}').attr('method', 'POST');
			$("input[name=especial]").change();
	    })
	});


	function editCategorie(id)
	{
		var url = "{{ route('web.categorie.edit', ':ID') }}".replace(':ID', id)
	    var form = $('#frmCategorie')
			form.attr('action', '{{ route('web.categorie.update', ':ID') }}'.replace(':ID', id))
			form.attr('method', 'POST')

		$.ajax({
			url: url,
			dataType: 'json',
		})
		.done(function(data) {
			$('#mdCategoriePlus').modal('show')
			$.each(data, function(index, val) {
				$('#frmCategorie #'+index).val(val)
			});
		})
		.fail(function(data) {
			console.log(data);
		})
	}

	function editSupplier(id)
	{
		var url = "{{ route('web.articles.supplier.edit', ':ID') }}".replace(':ID', id)
	    var form = $('#frmSupplier')
			form.attr('action', '{{ route('web.articles.supplier.update', ':ID') }}'.replace(':ID', id))
			form.attr('method', 'POST')

		$.ajax({
			url: url,
			dataType: 'json',
		})
		.done(function(data) {
			$('#mdSupplierPlus').modal('show')
			$.each(data, function(index, val) {
				$('#frmSupplier #'+index).val(val)
			});
		})
		.fail(function(data) {
			console.log(data);
		})
	}

	function fillTables(id)
	{
		var route = '{{ route('web.articles.table', ':ID') }}'.replace(':ID', id)
		var columns
		var table
		if (id == 1) {
			table = $('#articleTable')
			columns = [
			{ data: "img", name: "img", orderable: false, searchable: false},
			{ data: "description", name: "description"},
			{ data: "category", name: "category"},
			{ data: "mercado_publico_id", name: "mercado_publico_id"},
			{ data: "price", name: "price"},
			{ data: "id", name: "id", orderable: false, searchable: false},
			]
		}else if(id == 2) {
			table = $('#categorieTable')
			columns = [
			{ data: "img", name: 'img', orderable: false, searchable: false},
			{ data: "categorie", name: "categorie"},
			{ data: "description", name: "description"},
			{ data: "id", name: 'id', orderable: false, searchable: false},
			]
		}else if(id == 3){
			table = $('#supplierTable')
			columns = [
			{ data: "img", name: 'img', orderable: false, searchable: false},
			{ data: "maker", name: "maker"},
			{ data: "id", name: 'id', orderable: false, searchable: false},
			]
		}

		table.DataTable({
			processing: true,
			serverSide: true,
			ajax: route,
			columns: columns
		});

	}
</script>
@endpush