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
                <label for="email">E-Mail</label>
                <input type="email" name="email" class="form-control" readonly value="{{ old('email'), }}"></input>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"></input>
            </div>
            <div class="form-group">
                <label for="password">Contraseña<em> - Ingresar solo si se desea modificar </em></label>
                <input type="text" name="password" class="form-control" value="{{ old('password' )}}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Actualizar Usuario</button>
            </div>

        </form>
        
        <div class="row">
           
            <div class="col-md-4">
                <select name="" class="form-control" id="select-project">
                    <option value=""> Seleccione proyecto</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}"> {{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <select name="" class="form-control" id="select-level">
                    <option value=""> Seleccione nivel</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <button class="btn btn-primary btn-block">Asignar proyecto</button>
            </div>
        </div>
        
        
    </div>
</div>
@endsection


@section('scripts')
    <script src="/js/admin/users/edit.js"></script>
@endsection
