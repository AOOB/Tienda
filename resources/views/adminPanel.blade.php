@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<div>
@if (!Auth::guest()  && Auth::user()->accesscontrol == 1 )
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
    <div class="row">
        <div class="portlet-grid panel-info"> 
             <div class="panel-heading">
                    <a href="{{ url('/showCategory') }}"><h3 class="panel-title">Categorías.</h3></a>
              </div> 
              <div class="panel-body">
                    Alta de categorías.   
              </div> 
        </div>
        
    </div>
  <div class="row col-md-12" style="max-height: 5%; background: #efefef;" align="center">
    Acciones de Moderador.
  </div> 
  <div class="row">
        <div class="portlet-grid panel-success"> 
             <div class="panel-heading">
                    <a href="{{ url('/Comentarios') }}"><h3 class="panel-title">Comentarios.</h3></a>
              </div> 
              <div class="panel-body">
                    Aprobar los comentarios de los productos.   
              </div> 
        </div>
  </div> 
  <div class="row col-md-12" style="max-height: 5%; background: #efefef;" align="center">
    Pedidos.
  </div>
  <div class="row">
        <div class="portlet-grid panel-success"> 
             <div class="panel-heading">
                    <a href="{{ url('/ListadoPedidos') }}"><h3 class="panel-title">Pedidos.</h3></a>
              </div> 
              <div class="panel-body">
                    Aprobar/Cancelar los pedidos que se hicieron sobre los productos.   
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