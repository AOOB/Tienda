@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')
<div>
  <div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">
      <div class="work-progres">
        <div class="chit-chat-heading">
          Carrito de productos
        </div>
        <div class="table-responsive">
          <table  class="table table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Quitar producto</th>
                </tr>
            </thead>

            <tbody>

              @foreach ( Cart::content() as $item )
              <tr>
                <td>{{ $item->name     }}</td>
                <form method="get" action="{{ url('/editCart') }}">
                <td><input type="number" name="inputQuantity" value="{{ $item->qty      }}" required>
                <input type="hidden" name="inputId" value="{{ $item->rowId }}">
                <button type="submit" class="btn btn-info">Aplicar cambios</button></td>
                </form>
                <td>$ {{ number_format($item->price)    }}</td>        
                <td>$ {{ number_format($item->subtotal) }}</td>
                <td><a href="{{ url('/deleteItemCart') }}/{{ $item->rowId }}" class="btn btn-danger">Eliminar Producto</a></td>
              </tr>
              @endforeach     

            </tbody>

            <tpfoot>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Subtotal</td>
                    <td>$ {{Cart::subtotal()}}</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Impuestos</td>
                    <td>$ {{Cart::tax()}} </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td>$ {{Cart::total()}}</td>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
      @if (Auth::guest())
        <div class="row">
          <p>Favor de logearte para realizar la compra aquí</p>
          <a href="{{ url('/Login') }}">Logeate</a>
        </div>
      @else
        <div class="row" style="margin-left: 5%; margin-top: 2%;">
          <a href="{{ url('/buy') }}" class="btn btn-success">Realizar Compra</a>
        </div>
      @endif
    </div>
  </div>   
</div>
@endsection