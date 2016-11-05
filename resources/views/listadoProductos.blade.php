@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<div class="chit-chat-layer1">
	<div class="col-md-6 chit-chat-layer1-left">
      <div class="work-progres">
          <div class="chit-chat-heading">
              Listado de Productos
           </div>
            <div class="table-responsive">
             <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>                                   
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>1</td>
                      <td><a href="{{url('/ModificarProducto')}}">spiderman</a></td>
                      <td> 0 </td>                                                                      
                      <td><span class="label label-danger">compra mas</span></td>
                      
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="{{url('/ModificarProducto')}}">thor</a></td>
                      <td>2</td>                                                                  
                      <td><span class="label label-success">si hay</span></td>
                      
                    </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
@endsection