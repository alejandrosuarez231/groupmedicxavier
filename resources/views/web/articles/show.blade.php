@extends('layouts.app')

@section('toolbar')
<ul class="nav navbar-nav element-active-slate-400">
	<li class="active"><a href="#1" data-toggle="tab" aria-expanded="false"><i class="icon-file-eye position-left"></i>Detalles</a></li>
	<li><a href="#2" data-toggle="tab" aria-expanded="true"><i class="icon-menu7 position-left"></i>Caracteristicas</a></li>
	<li><a href="#3" data-toggle="tab"><i class="icon-images3 position-left"></i> Galería</a></li>
</ul>
@endsection


@section('content')

<div class="tabbable">
	<div class="tab-content">
		<div class="tab-pane fade active in" id="1">
			<div class="col-md-6 col-md-offset-3">
				{!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
				<div class="panel panel-flat no-border-radius border-top-primary">
					<div class="panel-body">
						<div class="form-group form-group-sm">
							{!! Form::label('description', 'Descripción', ['class' => 'control-label col-sm-4']) !!}
							<div class="col-sm-8">
								{!! Form::text('description', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group form-group-sm">
							{!! Form::label('product_maker_id', 'Proveedor o Fabricante', ['class' => 'control-label col-sm-4']) !!}
							<div class="col-sm-8">
								{!! Form::select('product_maker_id', $suppliersCbo, null, ['class' => 'form-control', 'placeholder' => '']) !!}
							</div>
						</div>

						<div class="form-group form-group-sm">
							{!! Form::label('product_categorie_id', 'Categoria', ['class' => 'control-label col-sm-4']) !!}
							<div class="col-sm-8">
								{!! Form::select('product_categorie_id', $categoriesCbo, null, ['class' => 'form-control', 'placeholder' => '']) !!}
							</div>
						</div>

						<div class="form-group form-group-sm">
							{!! Form::label('mercado_publico_id', 'ID Mercado Publico', ['class' => 'control-label col-sm-4']) !!}
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">
										{!! Form::checkbox('especial', true) !!}
									</span>
									{!! Form::text('mercado_publico_id', null, ['class' => 'form-control', 'disabled' => true]) !!}
								</div>
							</div>
						</div>
						<div class="form-group form-group-sm">
							{!! Form::label('price', 'Precio Unitario', ['class' => 'control-label col-sm-4']) !!}
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									{!! Form::text('price', null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer text-right pt-5 pb-5">
						<button type="submit" class="btn border-slate text-slate-800 btn-flat"><i class="icon-pencil7 position-left"></i> actualizar</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>

		<div class="tab-pane fade" id="2">
			<div class="col-md-6">
				{!! Form::open(['route' => ['web.articles.caracteristics.store', $article->id], 'class' => 'form-horizontal']) !!}
				<div class="panel  border-top-info no-border-radius">
					<div class="panel-body">
						<div class="form-group">
							{!! Form::label('feature', 'Carácteristica:', ['class' => 'col-lg-3 control-label']) !!}
							<div class="col-lg-9">
								{!! Form::text('feature', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('feature_details', 'Definición:', ['class' => 'col-lg-3 control-label']) !!}
							<div class="col-lg-9">
								{!! Form::text('feature_details', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="text-right">
							<button type="submit" class="btn border-slate text-slate-800 btn-flat">Agregar <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</div>
				</div>
				{!! Form::close() !!}
			</div>

			<div class="col-md-6">
				<div class="panel panel-white border-top-info no-border-radius">
					<div class="panel-heading">
						<h6 class="panel-title">{{ $article->description }}</h6>

					</div>

					<div class="panel-body table-responsive">
						<p class="content-group-sm text-muted">Detalles del producto.</p>
						<table class="table table-xxs">
							<tbody>
								@foreach ($article->caracteristics as $element)
								<tr>
									<td class="col-xs-4"><strong>{{ $element->feature }}</strong></td>
									<td class="col-xs-6">{{ $element->feature_details }}</td>
									<td class="col-xs-2 text-right">
										{!! Form::open(['route' => ['web.articles.caracteristics.destroy', $element->id], 'method' => 'DELETE']) !!}
										<button type="submit" class="btn btn-xs text-warning-600 btn-flat btn-icon"><i class="icon-trash"></i></button>
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
		<div class="tab-pane fade" id="3">
			<div class="col-md-6">
				<div class="panel panel-flat no-border-radius border-top-primary">
					<div class="panel-body">
						{!! Form::open(['route'=> ['web.articles.galery.store', $article->id], 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}

						<div class="dropzone-previews"></div>
						<div class="inline-block">
							<button type="submit" class="btn btn-xs border-slate text-slate-800 no-border-radius btn-flat" id="submit"><i class="icon-cloud position-left"></i>Subir imagenes</button>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>

			<div class="col-md-6">
				@foreach (collect($article->pictures)->sortByDesc('principal') as $element)
				<div class="col-lg-6 col-xs-6">
					<div class="thumbnail no-border-radius">
						<div class="thumb">
							<img class="no-border-radius" src="http://scinformatica.cl/site/public/{{ $element->route }}" alt="">
							<div class="caption-overflow">
								<span>
									{!! Form::open(['route' => ['web.articles.galery.destroy', $element->id], 'method' => 'DELETE', 'class' => 'form-horizontal']) !!}
									@if (!$element->principal)
									<a href="{{ route('web.articles.galery.changePrimary', $element->id) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-sync"></i></a>
									@endif
									<a href="http://scinformatica.cl/site/public/{{ $element->route }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
									<button type="submit" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-trash"></i></button>
									{!! Form::close() !!}
								</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>		
		</div>
	</div>
</div>
@endsection

@push('js')
{!! Html::script('assets/js/plugins/uploaders/dropzone.min.js') !!}
{!! Html::script('assets/js/plugins/media/fancybox.min.js') !!}
<script>
	$(document).ready(function() {
		$("input[name=especial]").on('change', function() {
			if( $(this).is(':checked') ) {
				$('#mercado_publico_id').attr('disabled', false)
			}else{
				$('#mercado_publico_id').attr('disabled', true).val('')
			}
		});

		@if ($article->mercado_publico_id)
		$('input[name=especial]').prop("checked", true)
		$('#mercado_publico_id').attr('disabled', false);
		@endif

		$('[data-popup="lightbox"]').fancybox({
			padding: 3
		});

			/*
			$(".dropzone").dropzone({
				paramName: "file",
				maxFilesize: 1,
				maxFiles: 30,
				dictDefaultMessage: 'Arrastre los archivos para subirlos <span>o haga CLICK</span>',
				autoProcessQueue: true,
				init: function() {
					this.on('addedfile', function(file){
						if (this.fileTracker) {
							this.removeFile(this.fileTracker);
						}
						this.fileTracker = file;
					});
				}
			});
			*/

			Dropzone.options.myDropzone = {
				autoProcessQueue: false,
				uploadMultiple: true,
				maxFilezise: 0.5,
				maxFiles: 5,
				acceptedFiles: 'image/*',
				dictDefaultMessage: 'Arrastre los archivos para subirlos <span>o haga CLICK</span>',

				init: function() {
					var submitBtn = document.querySelector("#submit");
					myDropzone = this;

					submitBtn.addEventListener("click", function(e){
						e.preventDefault();
						e.stopPropagation();
						myDropzone.processQueue();
					});
					this.on("addedfile", function(file) {
					});

					this.on("complete", function(file) {
						myDropzone.removeFile(file);
						location.reload();
					});
					this.on('', function(file) {
						myDropzone.removeFile(file);
						//swall('alerta')
					});
					this.on("success", function (file){
						myDropzone.processQueue.bind(myDropzone);
						
					});
				}
			};
		});
	</script>
	@endpush