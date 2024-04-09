@extends('layout')

@section('title', 'Página de inicio')

@section('content')
    <!-- card examen-->
    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-users me-1"></i> Registro de examenes
        </div>
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-9">
                    <input id="detalle" type="text" class="form-control" placeholder="Ingrese el nombre del examen" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <button id="btnBuscar" type="button" class="btn btn-primary">Buscar</button>
                </div>
            </div>
            <hr />
             <table id="tablaExamen" style="white-space: nowrap;">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div> <!-- end card examen-->
@endsection

@section('script')
    @if(isset($data_examen))
        <script>
            const data_examen = {!! $data_examen !!};
        </script>
    @endif
    <script src="/public/js/controladores/examenes.js" type="module">></script>
@endsection