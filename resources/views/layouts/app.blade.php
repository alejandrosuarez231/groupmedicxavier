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
    @stack('css')

    {{-- /global stylesheets --}}

    

</head>

<body class="navbar-top pace-done">

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


    {{-- Page container --}}
    <div class="page-container">

        {{-- Page content --}}
        <div class="page-content">

            {{-- Main sidebar --}}
            @include('layouts.elements.menu')
            {{-- /main sidebar --}}


            {{-- Main content --}}
            <div class="content-wrapper">

                {{-- Page header --}}
                @include('layouts.elements.page_header')
                {{-- /page header --}}
                

                {{-- Content area --}}
                <div class="content">
                    {{-- content --}}
                    @yield('content')
                    {{-- /content --}}


                    {{-- footer --}}
                    @include('layouts.elements.footer')
                    {{-- /footer --}}

                </div>
                {{-- /content area --}}

            </div>
            {{-- /main content --}}
            
            {{-- Left Menu --}}
            @include('layouts.elements.menuRight')
            {{-- /Left Menu --}}

        </div>
        {{-- /page content --}}
    </div>
    {{-- /page container --}}
    
    {{-- Core JS files --}}
    
    {!! Html::script('assets/js/plugins/notifications/sweet_alert.min.js') !!}
    {!! Html::script('assets/js/plugins/loaders/pace.min.js') !!}
    {!! Html::script('assets/js/core/libraries/jquery.min.js') !!}
    {!! Html::script('assets/js/core/libraries/bootstrap.min.js') !!}
    {!! Html::script('assets/js/plugins/loaders/blockui.min.js') !!}
    {{-- /core JS files --}}
    
    {{-- Theme JS files --}}
    {!! Html::script('assets/js/plugins/visualization/d3/d3.min.js') !!}
    {!! Html::script('assets/js/plugins/visualization/d3/d3_tooltip.js') !!}
    {!! Html::script('assets/js/plugins/forms/styling/switchery.min.js') !!}
    {!! Html::script('assets/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script('assets/js/plugins/forms/selects/bootstrap_multiselect.js') !!}
    {!! Html::script('assets/js/plugins/ui/moment/moment.min.js') !!}
    {!! Html::script('assets/js/plugins/pickers/daterangepicker.js') !!}
    {!! Html::script('assets/js/plugins/notifications/pnotify.min.js') !!}
    
    {!! Html::script('assets/js/core/app.js') !!}
    
    {!! Html::script('js/app.js') !!}

    @include('sweet::alert')
    @include('layouts.elements.js')
    
    @stack('js')
    {{-- /theme JS files --}}
</body>
</html>
