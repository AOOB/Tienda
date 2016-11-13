@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')
<div>
@if (!Auth::guest())
  <div class="chit-chat-layer1">
    <div class="col-md-8 chit-chat-layer1-left">
      <div class="work-progres">
        <div class="chit-chat-heading">
          Listado de comentarios
        </div>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
              <th>#</th>
              <th>Persona que comentó</th>
              <th>Producto donde comentó</th>
              <th>Comentarió</th>
              <th>Acción</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $comments as $comment )
              <tr>
                <td>{{ $comment->id }}</td>
                <td><a href="{{ url('/perfil') }}/{{ $comment->user_id }}">{{ $comment->name }}</a></td>
                <td><a href="{{ url('/Producto')}}/{{ $comment->product_id }}"> {{$comment->product_name}} </a></td>                                                                      
                <td> {{$comment->comment}} </td>
                <td>
                    <form action="{{ url('/commentAction') }}">
                      <select name="inputOption"> 
                        <option value="0">Aceptar</option>
                        <option value="1">Eliminar</option>
                      </select> 
                      <input type="hidden" name="inputCommentId" value="{{ $comment->id }}">
                      <button type="submit" class="btn btn-info">Apicar</button>
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