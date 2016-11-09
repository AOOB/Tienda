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
<div style="position:absolute; top:30px; left:100px; width:200px; height:200px; visibility:visible z-index:1">
	<img class="img-rounded" style="margin-top: 20px;" src="https://scontent-lax3-1.xx.fbcdn.net/v/t1.0-9/12821561_10208893317274917_7077759868507192459_n.jpg?oh=f6bd71a22adfbb1334488ac5a0f8fb56&oe=589B4F38" height="300" width="300"></div>
	<div style="position:absolute; top:300px;  width:250px;  visibility:visible z-index:2"><a href="{{url('/')}}" target="_blank"onclick="window.open(this.href, this.target,'top=100,left=50, width=500,height=100'); return false;" ><img src="https://images.designtrends.com/wp-content/uploads/2016/01/18110453/Flat-Camera-Icon.png" height="50" width="60"></a></div>
</div>

<i class="" aria-hidden="true"></i>
<div class="col-md-6" >
<div class="portlet-grid panel-danger" style="margin-top: 60px; width: 300px; "  > 
	 <div class="panel-heading">
	     <h3 class="panel-title" >Informacion</h3>
	  </div> 
	  <div class="panel-body" >
	  	<b><h3>Nombre:</h3></b><input type="text" class="form-control" name=""><br>
	  	<b><h3>E-mail:</h3></b><input type="text" class="form-control" name="">
	   </div> 

<form action="{{url('/calando')}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="image">Imagen (url)</label>
			<input  name="image" class="form-control" required>
		</div><a href="{{url('/principal')}}"><button>ll</button></a>

 

@endsection