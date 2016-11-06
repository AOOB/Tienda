@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<div>
	<div class="row col-md-12" style="max-height: 5%; background: #efefef;" align="center">
		Productos.
	</div>
	<div class="row">
		<div class="portlet-grid panel-info"> 
    		 <div class="panel-heading">
    		     	<a href="{{url('/nuevoProducto')}}"><h3 class="panel-title">Altas.</h3></a>
    		  </div> 
    		  <div class="panel-body">
    		 		Alta nuevos productos.	 
    		  </div> 
    	</div>
    	<div class="portlet-grid panel-info"> 
    		 <div class="panel-heading">
    		     	<a href="{{url('/ListadoProductos')}}"><h3 class="panel-title">Listado.</h3></a>
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
</div>

@endsection