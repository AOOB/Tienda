@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<div class="chit-chat-layer1">
  <div class="col-md-8 chit-chat-layer1-left">
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
                    <th>Precio</th>
                    <th>Ventas</th>
                    <th>Valoración</th>
                    <th>Cantidad</th>                                   
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ( $dataProducts as $product )
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td><a href="{{ url('/ModificarProducto') }}/{{ $product->id }}">{{ $product->name }}</a></td>
                      <td> {{$product->price}} </td>                                                                      
                      <td> {{$product->sellers}} </td>
                      <td> {{$product->valoration}} </td>                                                                      
                      <td> {{$product->quantity}} </td>                                                                      
                        <td>
                          @if ( $product->quantity <= 20 )
                            <span class="label label-danger">compra mas</span>
                          @else
                            <span class="label label-success">En almacen</span> 
                          @endif
                        </td>
                    </tr>
                @endforeach     
                </tbody>
              </table>
          </div>
        </div>
      </div>
@endsection