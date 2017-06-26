@extends('layouts.app')

@push('js-files')
{!! Html::script('assets/js/plugins/pickers/pickadate/picker.js') !!}
{!! Html::script('assets/js/plugins/pickers/pickadate/picker.time.js') !!}
@endpush

@push('js')
	{!! Html::script('js/horario-show.js') !!}
	{!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
{!! JsValidator::formRequest('App\Http\Requests\HorarioRequest', '#frmCreateHorario'); !!}
@endpush

@section('page-title', 'Horario de médico')

@section('content')
@if (count($errors) > 0)
{{-- <div class="col-md-8 col-md-offset-2"> --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
{{-- </div> --}}
@endif
<div class="row">
	{!! Form::open(['route' => ['horario.update', $medico->id], 'method' => 'PUT', 'id' => 'frmCreateHorario']) !!}
	<div class="col-md-4">
		<div class="panel border-top-primary">
			<div class="panel-body">

				<div class="form-group">
					{!! Form::label('dia', 'Dia de atencion', ['class' => 'sr-only']) !!}
					{!! Form::select('dia', ['lunes' => 'Lunes', 'martes' => 'Martes', 'miercoles' => 'Miercoles', 'jueves' => 'Jueves', 'viernes' => 'Viernes', 'sabado' => 'Sabado', 'domingo' => 'Domingo'], null, ['class' => 'form-control selectpicker', 'placeholder' => 'Día de atención']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('hora_ini', 'Inicio de atenciones', ['class' => 'sr-only']) !!}
					{!! Form::text('hora_ini', null, ['class' => 'form-control pickatime input-xs', 'placeholder' => 'Inicio de atenciones']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('hora_fin', 'Fin de atenciones', ['class' => 'sr-only']) !!}
					{!! Form::text('hora_fin', null, ['class' => 'form-control pickatime input-xs', 'placeholder' => 'Fin de atenciones']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('cant_pac', 'Cantidad de Pacientes', ['class' => 'sr-only']) !!}
					{!! Form::text('cant_pac', null, ['class' => 'form-control pickanumber input-xs', 'placeholder' => 'Cantidad de Pacientes']) !!}
				</div>

			</div>
			<div class="panel-footer text-right pr-20">
				<button type="submit" class="btn btn-flat text-primary border-primary">Guardar</button>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	<div class="col-md-8">
		<div class="panel border-top-primary">
			<div class="panel-body no-padding">
				<table class="table">
					<thead>
						<tr>
							<th>Lunes</th>
							<th>Martes</th>
							<th>Miercoles</th>
							<th>Jueves</th>
							<th>Viernes</th>
							<th>Sabado</th>
							<th>Domingo</th>
						</tr>
					</thead>
					<tbody>
					@for ($i = 0; $i < 3; $i++)
						<tr>
							@for ($j = 0; $j < 7; $j++)
							<td>&nbsp;</td>
							@endfor
						</tr>
					@endfor
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel border-top-primary">
			<div class="panel-body">
				@foreach ($medico->horario as $element)
					<p>{{ $element->dia }}</p>
					<p>{{ $element->turno }}</p>
					<p>{{ $element->hora_ini }}</p>
					<p>{{ $element->hora_fin }}</p>
					<p>Cantidad de Pacientes: {{ $element->cant_pac}}</p>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection