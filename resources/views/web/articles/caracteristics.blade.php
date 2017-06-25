@extends('layouts.app')

@section('content')
<div class="row">
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
@endsection