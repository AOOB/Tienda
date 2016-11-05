@extends('inicio')
@section('title', 'Productos Altas.')
@section('encabezado')
@endsection

@section('contenido')
<div>
<div align="center" class="row">
	<h2>Alta Producto.</h2>
</div>
<br>
<div class="row" style="min-width: 200px;"  >
	<form class="form-horizontal">
	  <fieldset >
	    <div class="form-group">
	      <label for="inputName" class="col-md-2 control-label">Nombre:</label>
	      <div class="col-md-5">
	        <input type="text" class="form-control" id="inputName" placeholder="Nombre">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="textArea" class="col-md-2 control-label">Descripción:</label>
	      <div class="col-md-5">
	        <textarea class="form-control" rows="3" id="textArea"></textarea>
	        <span class="help-block">Ligera y concreta descripción del producto.</span>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputImg" class="col-md-2 control-label">Imagen:</label>
	      <div class="col-md-5">
	        <input type="url" class="form-control" id="inputImg" placeholder="Url de la imagen">
	      </div>
	    </div>
	     <div class="form-group">
	      <label for="inputCant" class="col-md-2 control-label">Cantidad:</label>
	      <div class="col-md-5">
	        <input type="number" class="form-control" id="inputCant" placeholder="Cantidad de producto">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputPrecio" class="col-md-2 control-label">Precio:</label>
	      <div class="col-md-5">
	        <input type="number" class="form-control" id="inputPrecio" placeholder="$0.00">
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-md-10 col-md-offset-2">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>
</div>
</div>

@endsection