@extends('layouts.app')

@section('content')

<div class="card border-primary">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        
        @if(auth()->user()->is_support)
        <div class="card border-success">
            <div class="card-header">
                <h6 class="card-title">Incidencias asignadas a mi</h6>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr class="warning">
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha de creación</th>
                            <th>Título</th>
                        </tr>
                    </thead>

                    <tbody id="dashboard_my_incidents">
                        @foreach($my_incidents as $incident)
                        <tr>
                            <td>{{ $incident->id }}</td>
                            <td>{{ $incident->category->name }}</td>
                            <td>{{ $incident->severity_full }}</td>
                            <td>{{ $incident->id }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->title_short }}</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <div class="card border-success">
            <div class="card-header">
                <h6 class="card-title">Incidencias sin asignar</h6>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr class="warning">
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha de creación</th>
                            <th>Título</th>
                            <th>Opción</th>
                        </tr>
                    </thead>

                    <tbody id="dashboard_no_responsible">
                    @foreach($pending_incidents as $incident)
                        <tr>
                            <td>{{ $incident->id }}</td>
                            <td>{{ $incident->category->name }}</td>
                            <td>{{ $incident->severity_full }}</td>
                            <td>{{ $incident->id }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->title_short }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">
                                    Atender
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        @endif
        <div class="card border-success">
            <div class="card-header">
                <h6 class="card-title">Incidencias reportadas por mi</h6>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr class="warning">
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha de creación</th>
                            <th>Título</th>
                            <th>Responsable</th>
                        </tr>
                    </thead>

                    <tbody id="dashboard_to_others">
                    @foreach($incidents_by_me as $incident)
                        <tr>
                            <td>{{ $incident->id }}</td>
                            <td>{{ $incident->category->name }}</td>
                            <td>{{ $incident->severity_full }}</td>
                            <td>{{ $incident->id }}</td>
                            <td>{{ $incident->created_at }}</td>
                            <td>{{ $incident->title_short }}</td>
                            <td>{{ $incident->support_id ?: 'Sin asignar'}}</td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
