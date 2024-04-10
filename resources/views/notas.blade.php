@extends('layout')

@section('title', 'Notas')

@section('content')
    <!-- card examen-->
    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-check-circle"></i> Registro de notas
        </div>
        <div class="card-body">
             <table id="tablaNotas" style="white-space: nowrap;">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div> <!-- end card examen-->
@endsection

@section('script')
    <script src="/public/js/controladores/notas.js" type="module">></script>
@endsection