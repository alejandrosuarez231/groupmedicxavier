@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-flat border-top-lg border-top-info no-border-radius">
			<div class="panel-heading">
				<h4 class="panel-title">Información:</h4>
				<p>En esta sección se adjuntaran las promociones que apareceran en el baner de el sitio web <code>http://scinformatica.cl</code></p>
			</div>

			<div class="panel-body no-padding">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							@foreach ($promotions as $element)
							<tr class="bg-brown-300">
								<td colspan="4">Posición N° {{ $element->position }}</td>
							</tr>
							<tr>
								<td class="text-left">
									<h6 class="no-margin">{{ $element->title }}</h6>
								</td>
								<td class="text-left">
									<?php echo $element->description; ?>
								</td>
								<td class="text-right">
									<div class="media-right media-middle">
										<a href="#">
											@if ($element->img)
											<img src="http://scinformatica.cl/site/public/{{ $element->img }}" class="img-circle img-xs" alt="">
											@else
											<img src="http://scinformatica.cl/site/public/img/placeholder.jpg" class="img-circle img-xs" alt="">
											@endif
										</a>
									</div>
								</td>
								<td>
									{!! Form::open(['route' => ['banner.destroy', $element->id], 'method' => 'DELETE']) !!}
									<button type="submit" class="btn btn-xs border-warning text-warning-600 btn-flat btn-icon btn-rounded"><i class="icon-trash"></i></button>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		{!! Form::open(['route' => 'banner.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'frmBannerAddItem']) !!}
		<div class="panel panel-flat border-top-lg border-top-info no-border-radius">
			<div class="panel-heading">
				<h4 class="panel-title">Promoción - Información:</h4>
			</div>
			<div class="panel-body no-padding">
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('title', 'Encabezado', ['class' => 'col-lg-2 control-label']) !!}
						<div class="col-lg-7">
							{!! Form::text('title', null, ['class' => 'form-control border-top-teal border-top-lg']) !!}
						</div>

						<div class="col-lg-3">
							{!! Form::select('title_animation', $animation, null, ['class' => 'form-control border-top-danger-300 border-top-lg', 'placeholder' => 'Animación']) !!}
						</div>

					</div>

					<div class="form-group">
						{!! Form::label('description', 'Descripcion', ['class' => 'col-lg-2 control-label']) !!}
						<div class="col-lg-7">
							{!! Form::textArea('description', null, ['class' => 'form-control border-top-teal border-top-lg', 'cols' => '50', 'rows' => '4']) !!}
						</div>
						<div class="col-lg-3">
							{!! Form::select('description_animation', $animation, null, ['class' => 'form-control border-top-danger-300 border-top-lg', 'placeholder' => 'Animación']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('img', 'Imagen', ['class' => 'col-lg-2 control-label']) !!}
						<div class="col-lg-7">
							{!! Form::file('img', ['class' => 'file-input', 'data-show-upload' => 'false', 'data-show-preview' => 'false']) !!}
							<span class="help-block">Para una buena apaciencia es recomendable utilizar imagenes *.PNG con fondo transparente.</span>
						</div>
						<div class="col-lg-3">
							{!! Form::select('img_animation', $animation, null, ['class' => 'form-control border-top-danger-300 border-top-lg', 'placeholder' => 'Animación']) !!}
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary">Guardar información <i class="icon-cloud position-right"></i></button>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>

</div>
@endsection

@push('js')
{!! Html::script('assets/js/plugins/forms/styling/switchery.min.js') !!}
{!! Html::script('assets/js/plugins/uploaders/fileinput.min.js') !!}

{!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}

{!! JsValidator::formRequest('Cpanel\Http\Requests\BannerStoreRequest', '#frmBannerAddItem') !!}

<script>
	$(function() {
		$('.styled').uniform({
			radioClass: 'choice'
		});

		var toggle = Array.prototype.slice.call(document.querySelectorAll('.switchery'));

		toggle.forEach(function(html) {
			var switchery = new Switchery(html);
		});

		$('.file-input').fileinput({
			browseLabel: '',
			browseClass: 'btn btn-primary btn-icon',
			removeLabel: '',
			uploadLabel: '',
			uploadClass: 'btn btn-default btn-icon',
			browseIcon: '<i class="icon-plus22"></i> ',
			uploadIcon: '<i class="icon-file-upload"></i> ',
			removeClass: 'btn btn-danger btn-icon',
			removeIcon: '<i class="icon-cancel-square"></i> ',
			layoutTemplates: {
				caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
			},
			initialCaption: "No file selected"
		});

	});
</script>
@endpush