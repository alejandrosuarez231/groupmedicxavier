@extends('layouts.app')

@section('toolbar')
<ul class="nav navbar-nav element-active-slate-400">
	<li>
		<a href="#activity" data-toggle="tab" aria-expanded="false"><i class="icon-menu7 position-left"></i> 
			Mi Actividad
		</a>
	</li>
	<li class="">
		<a href="#schedule" data-toggle="tab" aria-expanded="true"><i class="icon-calendar3 position-left"></i>
			Tareas <span class="badge badge-success badge-inline position-right">0</span>
		</a>
	</li>
	<li class="active"><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Configuración</a></li>
</ul>
@endsection

@section('content')
<div class="tabbable">
	<div class="tab-content">
		<div class="tab-pane fade" id="activity">

		</div>
		<div class="tab-pane fade" id="schedule">

		</div>
		<div class="tab-pane fade active in" id="settings">
			{!! Form::model(Auth::user(), ['route' => ['user.update', Auth::user()->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
				<div class="panel panel-flat no-border-radius">
					<div class="panel-heading">
						<h5 class="panel-title">Información del Usuario</h5>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<fieldset>
								<legend class="text-semibold">
									<i class="icon-file-text2 position-left"></i>
									Información Básica
								</legend>
								<div class="form-group">
									{!! Form::label('name', 'Nombre', ['class' => 'col-lg-3 control-label']) !!}
									<div class="col-lg-9">
										{!! Form::text('name', null, ['class' => 'form-control']) !!}
									</div>
								</div>

								<div class="form-group">
									{!! Form::label('email', '', ['class' => 'col-lg-3 control-label']) !!}
									<div class="col-lg-9">
										{!! Form::email('email', null, ['class' => 'form-control']) !!}
									</div>
								</div>

								<div class="form-group">
									{!! Form::label('description', 'Cargo', ['class' => 'col-lg-3 control-label']) !!}
									<div class="col-lg-9">
										{!! Form::text('description', null, ['class' => 'form-control']) !!}
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset>
								<legend class="text-semibold">
									<i class="icon-reading position-left"></i>
									Cambio de Contraseña
								</legend>



								<div class="form-group">
									{!! Form::label('password', 'Contraseña Nueva', ['class' => 'col-lg-3 control-label']) !!}
									<div class="col-lg-9">
										{!! Form::password('password', ['class' => 'form-control']) !!}
									</div>
								</div>

								<div class="form-group">
									{!! Form::label('password', 'Repita Contraseña', ['class' => 'col-lg-3 control-label']) !!}
									<div class="col-lg-9">
										{!! Form::password('password_comparar', ['class' => 'form-control']) !!}
									</div>
								</div>
								
							</fieldset>
						</div>

					</div>
					<div class="panel-footer text-right pt-5 pb-5">
						<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>

	</div>
</div>
@endsection
