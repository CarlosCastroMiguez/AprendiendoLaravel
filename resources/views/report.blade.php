@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Reports</div>

    <div class="card-body">
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
                <label for="category_id">Categoria</label>
                <select name="category_id" class="form-control">
                    <option value="0"> General</option>
                    @foreach($categories as $category)
                    <option value="{{ $category -> id }}"> {{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="severity">Severidad</label>
                <select name="severity" class="form-control">
                    <option value="M">Menor</option>
                    <option value="N">Normal</option>
                    <option value="A">Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input name="title" name="title" class="form-control" value="{{ old('title') }}" required></input>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar incidencia</button>

            </div>

        </form>

    </div>
</div>
@endsection
