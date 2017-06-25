@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Visitas en el mes <small class="display-block">Se muestran todas las visitas los ultimos 31 días</small></h5>
			</div>
			<div class="panel-body">
				<div class="chart" id="visitors"></div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Páginas vistas en el mes <small class="display-block">Se muestran la cantidad de páginas vistas diariamente durante el mes</small></h5>
			</div>
			<div class="panel-body">
				<div class="chart" id="pageViews"></div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('js')
{!! Html::script('assets/js/plugins/visualization/d3/d3.min.js') !!}
{!! Html::script('assets/js/plugins/visualization/c3/c3.min.js') !!}
{!! Html::script('js/welcome.js') !!}

<script>
	$(document).ready(function() {
		
	});
</script>
@endpush