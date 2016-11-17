@extends('inicio')
@section('title', 'Productos modificacion')
@section('encabezado')
@endsection
@section('contenido')

@if ( !Auth::guest()  && Auth::user()->accesscontrol == 1  )
		<div>
			<div align="center" class="row">
				<h2>Alta Categoría.</h2>
			</div>
			
			<div class="row" style="min-width: 200px;"  >
				
				<div class="col-md-12" align="rigth">
					<div id="separador" style="background-color: #efefef;" align="center">
					Datos del la Categoria		
					</div>
					<table class="table table-hover">
			            <thead>
			              <tr>
			              <th>#</th>
			              <th>Nombre</th> 
			              <th>Opciones</th>
			              </tr>
			            </thead>
			            <tbody>
			            @foreach ( $categories as $category )
			              <tr>
			                <td>{{ $category->id }}</td>
			                <td>{{ $category->name }}</td>
			                <td>
			                	<a href=" {{ url('/deleteCategory') }}/{{ $category->id }} "><button class="btn btn-danger">Eliminar</button></a>
			                </td>
			               </tr>
			              @endforeach     
			            </tbody>
			        </table>
					<form class="form-horizontal" action="{{ url('/newCategory') }}">
					  <fieldset >
					    <div class="form-group">
					      <label for="inputName" class="col-md-2 control-label">Categoría:</label>
					      <div class="col-md-6">
					        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-10 col-md-offset-2">
					        <button type="submit" class="btn btn-success">Añadir</button>
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