<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        {{-- User menu --}}
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="{{ route('user.profile') }}" class="media-left"><img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">{{ Auth::user()->description }}</div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="fa fa-tasks fa-lg"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- /user menu --}}

        {{-- Main navigation --}}
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    {{-- Main --}}
                    <li class="navigation-header"><span>Menú</span> <i class="icon-menu" title="Menú Principal"></i></li>
                    <li class=""><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> <span>Panel Principal</span></a></li>
                    
                    <li class="">
                        <a href="#"><i class="fa fa-money fa-lg"></i> <span>Ventas</span></a>
                        <ul>
                            <li><a href="{{ route('clientes.index') }}">Cartera de Clientes</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-tasks fa-lg"></i> <span>Tareas</span></a>
                        <ul>
                            <li><a href="{{ route('marca.index') }}"><i class="glyphicon glyphicon-copyright-mark"></i> Marcas</a></li>
                        </ul>
                    </li>
                    <li class="disabled">
                        <a href="#"><i class="fa fa-file-text fa-lg"></i> <span>Facturación</span><span class="label">Próximamente</span></a>
                        <ul>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-internet-explorer fa-lg"></i> <span>Web Site</span></a>
                        <ul>
                            <li><a href="{{ route('articulos.index') }}">Artículos </a></li>
                            <li><a href="{{ route('promociones.index') }}">Promociones </a></li>
                            <li><a href="{{ route('banner.index') }}">Banner </a></li>
                            <li><a href="{{ route('siteUsers.index') }}">Clientes </a></li>
                        </ul>
                    </li>
                    <li class=""><a href="{{ route('user.index') }}"><i class="fa fa-users fa-lg"></i> <span>Usuarios</span></a></li>

                    {{-- /Main --}}
                </ul>
            </div>
        </div>
        {{-- /Main navigation --}}
    </div>
</div>

