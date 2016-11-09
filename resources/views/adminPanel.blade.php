@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<div>
@if (!Auth::guest())
	<div class="row col-md-12" style="max-height: 5%; background: #efefef;" align="center">
		Productos.
	</div>
	<div class="row">
		<div class="portlet-grid panel-info"> 
    		 <div class="panel-heading">
    		     	<a href="{{ url('/nuevoProducto') }}"><h3 class="panel-title">Altas.</h3></a>
    		  </div> 
    		  <div class="panel-body">
    		 		Alta nuevos productos.	 
    		  </div> 
    	</div>
    	<div class="portlet-grid panel-info"> 
    		 <div class="panel-heading">
    		     	<a href="{{ url('/ListadoProductos') }}"><h3 class="panel-title">Listado.</h3></a>
    		  </div> 
    		  <div class="panel-body">
    		 		Listado de los productos de la tienda.	 
    		  </div> 
    	</div>
    	<div class="portlet-grid panel-danger"> 
    		 <div class="panel-heading">
    		     	<a href="#"><h3 class="panel-title">Importaciones.</h3></a>
    		  </div> 
    		  <div class="panel-body">
    		 		Importación nuevos productos.	 
    		  </div> 
    	</div>
	</div>
@else
    <div align="center">
        <a href="{{ url('/principal') }}"><img src="http://8016235491c6828f9cae-6b0d87410f7cc1525cc32b79408788c4.r96.cf2.rackcdn.com/1129/65064974_1.jpg" height="500px" width="500px"></a>
    </div>
@endif      
</div>

@endsection