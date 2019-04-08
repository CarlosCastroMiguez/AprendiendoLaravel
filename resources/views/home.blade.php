@extends('layouts.app')

@section('content')

<div class="card border-primary">
    <div class="card-header">Dashboard</div>

    <div class="card-body">

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
                            <th>Resumen</th>
                        </tr>
                    </thead>

                    <tbody id="dashboard_my_incidents">

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
                            <th>Resumen</th>
                            <th>Opción</th>
                        </tr>
                    </thead>

                    <tbody id="dashboard_no_responsible">

                    </tbody>

                </table>
            </div>
        </div>
        
        <div class="card border-success">
            <div class="card-header">
                <h6 class="card-title">Incidencias asignadas a otros</h6>
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
                            <th>Resumen</th>
                            <th>Responsable</th>
                        </tr>
                    </thead>

                    <tbody id="dashboard_to_others">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
