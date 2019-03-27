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
                @if (auth()->user()-> role == 0)
                <a href="{{ url('/usuarios') }}" class="list-group-item list-group-item @if(request()->is('usuarios')) active @endif">
                    Usuarios
                </a>
                <a href="{{ url('/proyectos') }}" class="list-group-item list-group-item @if(request()->is('proyectos')) active @endif">
                    Proyectos
                </a>
                <a href="{{ url('/config') }}" class="list-group-item list-group-item @if(request()->is('config')) active @endif">
                    Configuración
                </a>
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
