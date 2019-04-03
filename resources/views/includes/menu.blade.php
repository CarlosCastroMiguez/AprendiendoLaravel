<div class="card border-primary mb-3">
    <div class="card-header">Menú</div>

    <div class="card-body">

        <div class="list-group">
            @if (auth()->check())
            <a href="{{ url('/home') }}" class="list-group-item list-group-item @if(request()->is('home')) active @endif ">
                Inicio
            </a>
            @if (!auth()->user()->is_client)
            <a href="{{ url('/ver') }}" class="list-group-item list-group-item @if(request()->is('ver')) active @endif">
                Ver incidencias
            </a>
            @endif
            <a href="{{ url('/report') }}" class="list-group-item list-group-item @if(request()->is('report')) active @endif">
                Reportar incidencias
            </a>
                @if (auth()->user()->is_admin)
                
                <ul class="list-group-item list-group-flush @if(request()->is('agregarsala')) active @endif @if(request()->is('agregarprofesor')) active @endif @if(request()->is('agregarasignatura')) active @endif">
                    <a class="nav-item dropdown">
                        <a class="nav-link- dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/usuarios">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/proyectos"> Proyectos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/config">Configuración</a>
                        </div>
                    </a>

                </ul>
                @endif
            @else
            <a href="{{ url('/') }}" class="list-group-item list-group-item @if(request()->is('/')) active @endif">
                Bienvenido
            </a>
            <a href="{{ url('/') }}" class="list-group-item list-group-item @if(request()->is('/')) active @endif">
                Instrucciones
            </a>
            <a href="{{ url('/') }}" class="list-group-item list-group-item @if(request()->is('/')) active @endif">
                Créditos
            </a>
            @endif
        </div>
    </div>
</div>
