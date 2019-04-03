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
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" ></input>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" ></input>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{ old('password', str_random(8)) }}" ></input>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary">Registrar Usuario</button>
            </div>

        </form>
        
        <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">
                    <tr class="warning">
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                       

                        <th>
                            <a href="/usuario/{{ $user-> id }}" class="btn btn-danger" title="Editar">
                                Editar
                            </a>
                            <a href="/usuario/{{ $user-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                                Eliminar
                            </a>
                        </th>

                    </tr>
                </tbody>
                @endforeach
            </table>

    </div>
</div>
@endsection
