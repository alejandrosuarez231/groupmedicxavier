<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Control | SC Informática</title>

    {{-- Global stylesheets --}}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') !!}
    {!! Html::style('assets/css/icons/icomoon/styles.css') !!}
    {!! Html::style('assets/css/icons/fontawesome/styles.min.css') !!}
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/core.min.css') !!}
    {!! Html::style('assets/css/components.min.css') !!}
    {!! Html::style('assets/css/colors.min.css') !!}

    {!! Html::style('css/app.css') !!}
    {{-- /global stylesheets --}}

</head>

<body class="login-container">
    {{-- Main navbar --}}
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('img/logo_small.png') }}" alt=""></a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="icon-user"></i>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('log.logout') }}"><i class="icon-switch2 text-danger"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>
                <li>

                    <a class="sidebar-control sidebar-opposite-fix hidden-xs" data-popup="tooltip" title="" data-placement="bottom" data-container="body" data-original-title="Parametrización del Sistema">
                    <i class="icon-cog3"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- /main navbar --}}


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Error title -->
					<div class="text-center content-group">
						<h1 class="error-title">404</h1>
						<h5>Vaya, se ha producido un error. ¡Página no encontrada!</h5>
					</div>
					<!-- /error title -->

                    {{ $exception->getMessage() }}
					


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	
	{!! Html::script('assets/js/plugins/notifications/sweet_alert.min.js') !!}
    {!! Html::script('assets/js/plugins/loaders/pace.min.js') !!}
    {!! Html::script('assets/js/core/libraries/jquery.min.js') !!}
    {!! Html::script('assets/js/core/libraries/bootstrap.min.js') !!}
    {!! Html::script('assets/js/plugins/loaders/blockui.min.js') !!}
    {{-- /core JS files --}}
    
</body>
</html>
