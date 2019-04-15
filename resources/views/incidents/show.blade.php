@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Reports</div>

    <div class="card-body">
       
        @if(session('notification'))
        <div class="alert alert-success">
            {{ session('notification') }}
        </div>
        @endif
        
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Codigo</th>
                    <th>Proyecto</th>
                    <th>Categoria</th>
                    <th>Fecha de Envio</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td id="incident_key">{{ $incident ->id}}</td>
                    <td id="incident_project">{{ $incident ->project->name}}</td>
                    <td id="incident_category">{{ $incident ->category_name}}</td>
                    <td id="incident_created_at">{{ $incident ->created_at}}</td>
                </tr>
            </tbody>
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Asignada a </th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Severidad</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td id="incident_responsible">{{$incident ->support_name}}</td>
                    <td id="incident_level">{{$incident ->level->name}}</td>
                    <td id="incident_state">{{$incident ->state}}</td>
                    <td id="incident_severity">{{$incident ->severity_full}}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped table-hover ">

            <tbody>
                <tr>
                    <th>Título</th>
                    <td id="incident_summary">{{ $incident ->title}}</td>

                </tr>
                <tr>
                    <th>Descripcion</th>
                    <td id="incident_description">{{ $incident ->description}}</td>

                </tr>
                <tr>
                    <th>Adjuntos</th>
                    <td id="incident_attachment">No se han adjuntado archivos</td>

                </tr>
            </tbody>

        </table>
        
        @if($incident->support_id == null && $incident->active)
        <a href="/incidencia/{{$incident->id}}/atender" class="btn btn-primary" title="Atender" id="incident_apply">
            Atender incidencia
        </a>
        @endif
        @if(auth()->user()->id == $incident->client_id)
            
            @if($incident->active)
            <a href="/incidencia/{{$incident->id}}/resolver" class="btn btn-info" title="Atender" id="incident_solve">
                Marcar como resuelta
            </a>
            @else
            <a href="/incidencia/{{$incident->id}}/abrir" class="btn btn-info" title="Atender" id="incident_open">
                Volver a abrir incidencia
            </a>
            @endif
        @endif
        
        <a a href="/incidencia/{{$incident->id}}/editar" class="btn btn-success" title="Atender" id="incident_edit">
            Editar incidencia
        </a>
        
        @if(auth()->user()->id == $incident->support_id && $incident-> active)
        <a href="/incidencia/{{$incident->id}}/derivar" class="btn btn-danger" title="Atender" id="incident_derive">
            Derivar al siguiente nivel
        </a>
        @endif

    </div>
</div>
@endsection
