@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-3">
	{!! Form::open(['route' => ['web.categorie.img.store', $categorie->id], 'enctype' => 'multipart/form-data']) !!}
	<div class="panel panel-flat no-border-radius border-top-primary">
		<div class="panel-heading">
			<h5 class="panel-title">Cargar imagenes del Artículo</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
				</ul>
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>

		<div class="panel-body">
			<div class="form-group">
				{!! Form::file('img', ['class' => 'file-input', 'accept' => '*.png, *.jpg']) !!}
			</div>
			<div class="text-right">
				<button type="submit" class="btn border-slate text-slate-800 btn-flat">Subir imagen<i class="icon-file-picture2 position-right"></i></button>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	
	@if ($categorie->img <> null)
		<div class="thumbnail no-border-radius">
			<div class="thumb">
				<img src="http://scinformatica.cl/site/public/{{ $categorie->img }}" alt="">
				<div class="caption-overflow">
					<span>
						{!! Form::open(['route' => ['web.categorie.img.destroy', $categorie->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}
						<a href="http://scinformatica.cl/site/public/{{ $categorie->img }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
						<button type="submit" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-trash"></i></button>
						{!! Form::close() !!}
					</span>
				</div>
			</div>
		</div>
	@endif
</div>
@endsection

@push('js')
{!! Html::script('assets/js/plugins/uploaders/fileinput.min.js') !!}
{!! Html::script('assets/js/plugins/media/fancybox.min.js') !!}

<script>
	$(document).ready(function() {

		// Inicializar los estilos de checkbox
		$(".styled").uniform({
			radioClass: 'choice'
		});

		$('[data-popup="lightbox"]').fancybox({
			padding: 3
		});

		$('.file-input').fileinput({
			showUpload:false,
			browseLabel: '',
			browseClass: 'btn btn-sm border-slate text-slate-800 btn-flat btn-icon',
			browseIcon: '<i class="icon-plus22"></i> ',
			removeLabel: '',
			removeClass: 'btn btn-sm border-danger text-danger-800 btn-flat btn-icon',
			removeIcon: '<i class="icon-trash"></i> ',
			layoutTemplates: {
				caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
			},
			initialCaption: "Seleccione una imagen"
		});

	});
</script>
@endpush