@extends('inicio')
@section('title', 'Productos modificacion')
@section('encabezado')
@endsection
@section('contenido')

@if ( !Auth::guest()  && Auth::user()->accesscontrol == 1  )
		<div>
			<div align="center" class="row">
				<h2>Alta de articulo con archivo CSV.</h2>
			</div>
			
			<div class="row" style="min-width: 200px;"  >
				
				<div class="col-md-12" align="rigth">
					<div id="separador" style="background-color: #efefef;" align="center">
					Archivo CSV		
					</div>
					<form class="form-horizontal" action="{{ url('/escan') }}" enctype="multipart/form-data" method="POST">
					  <fieldset >
					    <div class="form-group">
					      <label for="inputFile" class="col-md-2 control-label">Archivo:</label>
					      <div class="col-md-6">
					      	{{ csrf_field() }}
					        <input type="file" class="form-control" id="inputFile" name="inputFile" placeholder="Seleccione un archivo" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-10 col-md-offset-2">
					        <button type="submit" class="btn btn-success">Subir Archivo</button>
					      </div>
					    </div>
					  </fieldset>	      
					</form>
				</div>
			</div>

		</div>

@else
	<div align="center">
        <a href="{{ url('/principal') }}"><img src="http://8016235491c6828f9cae-6b0d87410f7cc1525cc32b79408788c4.r96.cf2.rackcdn.com/1129/65064974_1.jpg" height="500px" width="500px"></a>
    </div>
@endif

@endsection