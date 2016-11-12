@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')

<h1>Perfil</h1>

<div align="center" class="col-md-6">
<div  align="right" style="position:absolute; top:30px; left:700px; width:200px; height:200px; visibility:visible z-index:1">
	<img class="img-rounded" style="margin-top: 20px;" src="{{ Auth::user()->image }}" height="300" width="300"></div>
	<div style="position:absolute; top:300px;  width:1450px;  visibility:visible z-index:2"><a href="{{url('/Image')}}" target="popup"onclick="window.open(this.href, this.target,'top=100,left=50, width=500,height=100'); return location.reload(true);" ><img src="https://images.designtrends.com/wp-content/uploads/2016/01/18110453/Flat-Camera-Icon.png" height="50" width="60"></a></div>
</div>

	<div class="row col-md-7" style="max-height: 5%; background: #efefef;" align="center">
		Datos del usuario
	</div>
	<div class="col-md-7" style="margin-top: 30px;" >
	<form class="form-horizontal"  action="{{ url('/') }}" method="get" >
	  <fieldset >
	    <div class="form-group" >
	      <label for="name" class="col-md-2 control-label">Nombre:</label>
	      <div class="col-md-6">
	        <label class="form-control--static mb-0"  name="name">{{ Auth::user()->name }}</label>
	      </div>
	    </div>
	   <div class="form-group" >
	      <label for="lastname" class="col-md-2 control-label">Apellido:</label>
	      <div class="col-md-6">
	        <label class="form-control--static mb-0" name="lastname">{{ Auth::user()->lastname }}</label>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="email" class="col-md-2 control-label">E-mail:</label>
	      <div class="col-md-6">
	        <label class="form-control--static mb-0" name="email">{{ Auth::user()->email }}</label>
	      </div>
	    </div>
	    </fieldset>	      
	</form>
		</div>

		<!--Metodo de pago-->


		<div id="separador" style="background-color: #efefef;" align="center">
			Imagen		
		</div><br>
<div class="col-md-7" style="margin-top: 30px;" >
	<form class="form-horizontal" action="{{ url('/mostrarInfoPago') }}" method="get"  >
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}}">

	  <fieldset >
	  <div id="separador" style="background-color: #efefef;" align="center">
			Metodo de Pago		
		</div><br>
	     <div class="form-group">
	      <label for="address" class="col-md-2 control-label">Direccion:</label>
	      <div class="col-md-6">
	        <input type="text" name="address" class="form-control" value="{{$dataPago->address}}" >
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="country" class="col-md-2 control-label">Pais:</label>
	      <div class="col-md-6">
	        <input type="text" name="country" class="form-control" >    
	      </div>
	      </div>
	       <div class="form-group">
	      <label for="state" class="col-md-2 control-label">Estado:</label>
	      <div class="col-md-6">
	        <input type="text" name="state" class="form-control" >    
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="city" class="col-md-2 control-label" >Ciudad:</label>
	      <div class="col-md-6">
	        <input type="text" name="city" class="form-control" >    
	      </div>
	    </div>
	     <div class="form-group">
	     <img src="https://www.crossroads.ca/images/payment/amex.png" height="30" width="40">
        <img src="https://aimmgmchi.cwpayments.com/registro/assets/images/logo_visa_mastercard.png" height="30" width="100">
	      <label for="plastic_number" class="col-md-2 control-label">Num. de tarjeta:</label>
	      <div class="col-md-6">
	        <input type="number" name="plastic_number" class="form-control"  >    
	      </div>
	    </div>
	     <div class="form-group">
	      <label for="expiration_date" class="col-md-2 control-label">Fecha de caducidad:</label>
        <div class="col-md-6">
          <input type="text" name="expiration_date" class="form-control" placeholder="MM / YY"  >   
	      </div>
	    </div>
	      <div class="form-group">
	      <label for="CVV" class="col-md-2 control-label">Codigo de seguridad:</label>
	      <div class="col-md-6">
	        <input type="number" name="CVV" class="form-control" >    
	      </div>
	    </div>
	     <div class="form-group">
	      <label for="postal_code" class="col-md-2 control-label">Codigo Postal:</label>
	      <div class="col-md-6">
	        <input type="number" name="postal_code" class="form-control" >    
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-md-10 col-md-offset-2">
	        <button type="submit" class="btn btn" style="background: #000000;"><a href="{{url('/Configuracion')}}"> Editar</a></button>
	      </div>
	    </div>
	  </fieldset>	      
	</form>
		</div>
		
			

	  
@endsection