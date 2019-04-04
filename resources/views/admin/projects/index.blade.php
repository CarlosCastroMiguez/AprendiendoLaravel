@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Index</div>

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

        <form action="" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" ></input>
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}" ></input>
            </div>
            <div class="form-group">
                <label for="start">Fecha de Inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', date('Y-m-d')) }}" ></input>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary">Registrar proyecto</button>
            </div>

        </form>
        
        <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">
                    <tr class="warning">
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha de Inicio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                @foreach($projects as $project)
                <tbody>
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->start ?: 'No se ha indicado' }}</td>
                       

                        <td>
                            @if($project->trashed())
                            <a href="/proyecto/{{ $project-> id }}/restaurar" class="btn btn-success" title="Restaurar">
                                Restaurar
                            </a>
                            @else
                            <a href="/proyecto/{{ $project-> id }}" class="btn btn-danger" title="Editar">
                                Editar
                            </a>
                            <a href="/proyecto/{{ $project-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                                Eliminar
                            </a>
                            @endif
                        </td>

                    </tr>
                </tbody>
                @endforeach
            </table>

    </div>
</div>
@endsection
