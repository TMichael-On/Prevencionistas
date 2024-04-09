@extends('layout')

@section('title', 'Examen')

@section('content')
	<div id="contenido" >
		<div class="paginas">
		</div>
		<div id="botones">
				<button class="boton" data-target="pagina1">1</button>
				<button class="boton" data-target="pagina2">2</button>
				<button class="boton" data-target="pagina3">3</button>
				<button class="boton" data-target="pagina5">4</button>
				<button class="boton" data-target="pagina5">5</button>
				<button class="boton" data-target="pagina6">6</button>
				<button class="boton" data-target="pagina7">7</button>
				<button class="boton" data-target="pagina8">8</button>
				<button class="boton" data-target="pagina9">9</button>
				<button class="boton" data-target="pagina10">10</button>
				<button id="btnGuardar" type="button" class="btn btn-primary" style="margin-left: 5px;">Finalizar examen</button>
		</div>				
	</div>
@endsection

@section('script')
	@if(isset($data_preguntas))
        <script>
            const data_preguntas = {!! $data_preguntas !!};
        </script>
    @endif
	<script src="/public/js/controladores/examen.js" type="module"></script>
@endsection