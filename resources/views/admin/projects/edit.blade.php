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
                <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}"></input>
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $project->description) }}"></input>
            </div>
            <div class="form-group">
                <label for="start">Fecha de Inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', $project->start ) }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Guardar proyecto</button>
            </div>

        </form>

        <div class="row">

            <div class="col-md-6">

                <p>Categorias</p>
                <form action="/categorias" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}"></input>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese Nombre" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Añadir</button>
                    </div>
                </form>
                <table class="table table-bordered table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr class="warning">
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    @foreach($categories as $category)
                    <tbody>
                        <tr>
                            <td>{{ $category-> name }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" title="Editar" data-category="{{ $category-> id }}">
                                    Editar
                                </button>
                                <a href="/categoria/{{ $category -> id }}/eliminar" class="btn btn-danger" title="Eliminar" >
                                    Eliminar
                                </a>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>

            <div class="col-md-6">

                <p>Niveles</p>
                <form action="/niveles" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $project->id }}"></input>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese Nombre" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Añadir</button>
                    </div>
                </form>
                <table class="table table-bordered table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr class="warning">
                            <th>#</th>
                            <th>Nivel</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    @foreach($levels as $key => $level)
                    <tbody>
                        <tr>
                            <td>N{{ $key+1 }}</td>
                            <td>{{ $level -> name }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" title="Editar" data-level="{{ $level-> id }}">
                                    Editar
                                </button>
                                <a href="/nivel/{{$level -> id}}/eliminar" class="btn btn-danger" title="Eliminar">
                                    Eliminar
                                </a>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>


        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Editar Categoria</h3>
            </div>
            <form action="/categoria/editar" method="POST">
               {{ csrf_field() }}
                <div class="modal-body">

                    <input type="hidden" name="category_id" id="category_id" value=" "></input>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name"> Nombre de la categoria</label>
                            <input type="text" class="form-control" name="name" id="category_name" value=" ">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Nivel</h4>
            </div>
            <form action="/nivel/editar" method="POST">
               {{ csrf_field() }}
                <div class="modal-body">

                    <input type="hidden" name="level_id" id="level_id" value=" "></input>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name"> Nombre del nivel</label>
                            <input type="text" class="form-control" name="name" id="level_name" value=" ">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('scripts')
    <script src="/js/admin/projects/edit.js"></script>
@endsection