<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel de Control | SC Informática</title>

	<!-- Global stylesheets -->
	{!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') !!}
	{!! Html::style('assets/css/icons/icomoon/styles.css') !!}
	{!! Html::style('assets/css/bootstrap.css') !!}
	{!! Html::style('assets/css/core.css') !!}
	{!! Html::style('assets/css/components.css') !!}
	{!! Html::style('assets/css/colors.css') !!}

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	{!! Html::script('assets/js/plugins/loaders/pace.min.js') !!}
	{!! Html::script('assets/js/core/libraries/jquery.min.js') !!}
	{!! Html::script('assets/js/core/libraries/bootstrap.min.js') !!}
	{!! Html::script('assets/js/plugins/loaders/blockui.min.js') !!}
	<!-- /core JS files -->

	<!-- Theme JS files -->
	{!! Html::script('assets/js/plugins/forms/styling/uniform.min.js') !!}

	{!! Html::script('assets/js/core/app.js') !!}
	{!! Html::script('assets/js/pages/login.js') !!}

</head>
<body class="login-container">
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('img/logo_small.png') }}" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>
	</div>

	<div class="page-container">
		<div class="page-content">
			<div class="content-wrapper">
				<div class="content">
					{!! Form::open(['route' => 'log.login', 'autocomplete' => 'off']) !!}
					<div class="login-form">
						<div class="text-center">
							<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
							<h5 class="content-group-lg">Ingrese a su cuenta <small class="display-block">Introduzca sus credenciales</small></h5>
						</div>
						<div class="form-group has-feedback has-feedback-left">
							{!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Email']) !!}
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>
						<div class="form-group has-feedback has-feedback-left">
							{!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Contraseña']) !!}
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>
						<div class="form-group login-options">
							<div class="row">
								<div class="col-sm-6">
									<label class="checkbox-inline">
										{!! Form::checkbox('remember', true, false, ['class' => 'styled']) !!}
										Recordar
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn border-slate text-slate-800 btn-block btn-lg btn-flat">Acceder <i class="icon-arrow-right14 position-right"></i></button>
						</div>

						<span class="help-block text-center">Este sistema es netamente para el uso del personal de <a href="scinformatica.cl">SC Informatica LTDA</a>. el acceso no autorizado podra ser penalizado.</span>
					</div>
					{!! Form::close() !!}
					@include('layouts.elements.footer')
				</div>
			</div>
		</div>
	</div>
	
	{!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
	{!! JsValidator::formRequest('Cpanel\Http\Requests\UserValidateRequest', 'form') !!}
</body>
</html>
