@extends('inicio')
@section('encabezado')
@endsection

@section('contenido')

<table class="table table-striped table-hover "><br>
 <h3>Configuracion general de la cuenta</h3><br>
  <tbody>
    <tr>
      <td><b>Nombre</b></td>
      <td>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</td>
      <td><a href="{{url('/EditarNombre')}}">Editar</a></td>
    </tr>
    <tr>
      <td><b>E-mail</b></td>
      <td>{{ Auth::user()->email }}</td>
      <td><a href="">Editar</a></td>
    </tr>
    <tr >
      <td><b>Contraseña</b></td>
      <td>********</td>
      <td><a href="">Editar</a></td>
    </tr>
    <tr>
  </tbody>
</table> 


@endsection