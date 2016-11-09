@extends('inicio')
@section('title', 'Productos modificacion')
@section('encabezado')
@endsection
@section('contenido')
<div>
	<div align="center" class="row">
		<h2>Editar Producto.</h2>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div align="center" class="row" style="background-color: #efefef; border-right: 2px solid black;">
				Datos generales del producto
			</div>
			<div class="row" style="min-width: 200px; margin-left: 2%;"  >
				<form class="form-horizontal">
				  <fieldset>
				    <div class="form-group">
				   
				      <label for="inputName"  class="col-md-2 control-label">Nombre:</label>
				      <div class="col-md-5">
				        <input type="text"  value="{{ $dataProduct->name }}" class="form-control" id="inputName" placeholder="Nombre">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="textArea" class="col-md-2 control-label">Descripción:</label>
				      <div class="col-md-5">
				        <textarea class="form-control" style="max-width: 100%;" rows="3" id="textArea">{{ $dataProduct->description }}</textarea>
				        <span class="help-block">Ligera y concreta descripción del producto.</span>
				      </div>
				    </div>
				     <div class="form-group">
				      <label for="inputCant" class="col-md-2 control-label">Cantidad:</label>
				      <div class="col-md-5">
				        <input type="number" value="{{ $dataProduct->quantity }}" class="form-control" id="inputCant" placeholder="Cantidad de producto">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputPrecio"  class="col-md-2 control-label">Precio:</label>
				      <div class="col-md-5">
				        <input type="number" value="{{ $dataProduct->price }}" class="form-control" id="inputPrecio" placeholder="$0.00">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputDiscount"  class="col-md-2 control-label">Descuento:</label>
				      <div class="col-md-5">
				        <input type="number" value="{{ $dataProduct->discount }}" class="form-control" id="inputDiscount" placeholder="$0.00">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputVentas"  class="col-md-2 control-label">Ventas:</label>
				      <div class="col-md-5">
				        <input type="number" value="{{ $dataProduct->sellers }}" class="form-control" id="inputVentas" placeholder="$0.00">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputValorado"  class="col-md-2 control-label">Valoración:</label>
				      <div id="divValoration" class="col-md-5">
				    	 	<input value="{{ $dataProduct->valoration }}" id="inputValorado" onchange="makeStarts()" type ="range" min ="0" max="5.0" step ="0.01"/>
				    	  	<p id="calification">{{ $dataProduct->valoration }}</p>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-md-10 col-md-offset-2">
				        <button type="reset" class="btn btn-default">Cancelar</button>
				        <button type="submit" class="btn btn-primary">Guardar</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div align="center" class="row" style="background-color: #efefef; border-left: 2px solid black;">
				Imagen del producto
			</div>
			<div align="center" class="row" style="overflow: auto;">
				<img src="{{ $dataProduct->image }}">
			</div>		
			<form class="form-horizontal">
				<fieldset>
				    <div class="form-group">
				      <label for="inputImg" class="col-md-2 control-label">Imagen:</label>
				      <div class="col-md-5">
				        <input type="url" class="form-control" id="inputImg" placeholder="Url de la imagen">
				        <br>
				        <button type="submit"  class="btn btn-primary">Cambiar</button>
				      </div>
				    </div>
				</fieldset>
			</form>    
		</div>
	</div>
</div>
<script type="text/javascript">
	function makeStarts() {
	var calification = document.getElementById("inputValorado").value; 
	
	document.getElementById("calification").innerHTML = calification;
}
</script>

@endsection