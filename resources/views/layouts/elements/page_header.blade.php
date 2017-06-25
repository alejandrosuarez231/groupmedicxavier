<div class="page-header mb-20">
    <div class="page-header-content border-bottom border-bottom-info">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ (Session::get('title')) ?? '' }}</span></h4>
            
            @if (Breadcrumbs::renderIfExists())
            {!! Breadcrumbs::renderIfExists() !!}
            @else
            {!! Breadcrumbs::render(Session::get('breadCrumb'), Session::get('breadCrumbDynamic')) !!}
            @endif
        </div>
        @yield('aditionalOptions')
    </div>
    <div class="navbar navbar-default navbar-xs">
        <ul class="nav navbar-nav visible-xs-block">
            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-filter">

            @yield('toolbar')

            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    {{--
                    <li><a href="#"><i class="icon-stack-text position-left"></i> Notes</a></li>
                    <li><a href="#"><i class="icon-collaboration position-left"></i> Friends</a></li>
                    <li><a href="#"><i class="icon-images3 position-left"></i> Photos</a></li>
                    --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-gear"></i> <span class="visible-xs-inline-block position-right"> Options</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-image2"></i> Personalizar Sistema</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog5"></i> Parametrizar Sistema</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>