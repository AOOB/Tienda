@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')
<div>
  @if (!Auth::guest()  && Auth::user()->id == $sal[0]->user_id)
  <div class="chit-chat-layer1">
    <div class="col-md-8 chit-chat-layer1-left">
      <div class="work-progres">
        <div class="chit-chat-heading">
          Compras realizadas
        </div>
        <div class="table-responsive">
          <table  class="table table-hover">
            <thead>
                <tr>
                    <th>No. Compra</th>
                    <th>Total</th>
                    <th>Fecha de la compra</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $sal as $s )
              <tr>
                <td>{{$s->id  }}</td>
                <td>$ {{number_format($s-> total)}}</td>
                <td>{{$s-> created_at}}</td>
                <td><a href="{{url('pdf')}}/{{$s->id}}" class="btn btn-danger  glyphicon glyphicon-save-file" role="button"> PDF</a></td>
      
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