@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')
<div>
@if (!Auth::guest() && Auth::user()->accesscontrol == 1 )
  <div class="chit-chat-layer1">
    <div class="col-md-8 chit-chat-layer1-left">
      <div class="work-progres">
        <div class="chit-chat-heading">
          Listado de pedidos
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
              <th>#</th>
              <th>Persona que hizo el peido</th>
              <th>Producto pedido</th>
              <th>Cantidad</th>
              <th>Precio total</th>
              <th>Acción<th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $dataRequests as $dataRequest )
              <tr>
                <td>{{ $dataRequest->id }}</td>
                <td><a href="{{ url('/perfil') }}/{{ $dataRequest->user_id }}">{{ $dataRequest->user_name }}</a></td>
                <td><a href="{{ url('/Producto')}}/{{ $dataRequest->product_id }}"> {{$dataRequest->product_id}} </a></td>
                <td>{{ $dataRequest->quantity }}</td>                                                                      
                <td> {{($dataRequest->total) * 1}} </td>
                <td>
                    <form action="{{ url('/finishPurchase') }}" method="GET">
                      <input type="hidden" name="inputProductId" value="{{ $dataRequest->product_id }}">
                      <input type="hidden" name="inputRequestId" value="{{ $dataRequest->id }}">
                      <input type="hidden" name="inputQuantity" value="{{ $dataRequest->quantity }}">  
                      <select name="inputOption"> 
                        <option value="0">Eviado</option>
                        <option value="1">Cancelar Pedido</option>
                      </select> 
                      <button type="submit" class="btn btn-info">Aplicar acción</button>
                    </form>
                </td>                                                                      
               </tr>
              @endforeach     
            </tbody>
          </table>
        </div>
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