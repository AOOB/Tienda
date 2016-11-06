@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<h1>Perfil</h1>
<div class="row col-md-12" style="max-height: 5%; background: #efefef;" align="center">
		Perfil.
	</div>
<div align="center" class="col-md-6" >
	<img class="img-rounded" style="margin-top: 20px;" src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-9/12821561_10208893317274917_7077759868507192459_n.jpg?oh=f6bd71a22adfbb1334488ac5a0f8fb56&oe=589B4F38" height="300" width="300">
	<a class="fa fa-camera-retro"></a>
</div>



<i class="" aria-hidden="true"></i>
<div class="col-md-6" >
<div class="portlet-grid panel-info" style="margin-top: 20px;" > 
	 <div class="panel-heading">
	 
	     	<h3 class="panel-title">Informacion</h3>
	  </div> 
	  <div class="panel-body">

	  <ul>
	  	<li>Nombre</li>
	  	<li>E-mail</li>

	  </ul>
	 
	  </div> 
</div>
</div>


@endsection