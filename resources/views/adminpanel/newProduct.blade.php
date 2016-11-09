@extends('inicio')
@section('title', 'Productos Altas.')
@section('encabezado')
@endsection

@section('contenido')
<div>
	<div align="center" class="row">
		<h2>Alta Producto.</h2>
	</div>
	
	<div class="row" style="min-width: 200px;"  >
		
		<div class="col-md-7" align="rigth">
			<div id="separador" style="background-color: #efefef;" align="center">
			Datos del producto		
			</div>
			<form class="form-horizontal" action="{{ url('/newProduct') }}">
			  <fieldset >
			    <div class="form-group">
			      <label for="inputName" class="col-md-2 control-label">Nombre:</label>
			      <div class="col-md-6">
			        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre" required>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="textArea" class="col-md-2 control-label">Descripción:</label>
			      <div class="col-md-6">
			        <textarea class="form-control" name="inputDescription" rows="3" id="textArea" required></textarea>
			        <span class="help-block">Ligera y concreta descripción del producto.</span>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputImg" class="col-md-2 control-label">Imagen:</label>
			      <div class="col-md-6">
			        <input type="url" onchange="showimage()" class="form-control" name="inputImage" id="inputImage" placeholder="Url de la imagen">
			      </div>
			    </div>
			     <div class="form-group">
			      <label for="inputCant" class="col-md-2 control-label" >Cantidad:</label>
			      <div class="col-md-6">
			        <input type="number" name="inputQuantity" class="form-control" id="inputQuantity" required placeholder="Cantidad de producto">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputPrice" class="col-md-2 control-label">Precio:</label>
			      <div class="col-md-6">
			        <input type="number" name="inputPrice" step="0.01" class="form-control" id="inputPrice" placeholder="$0.00" required>
			        
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
		<div class="col-md-5">
			<div id="separador" style="background-color: #efefef;" align="center">
				imagen del producto		
			</div>
			
			<div align="center" style="margin-top: 15%;">
				<img id="imgNewProd" src="" style="max-height: 400px; max-width: 400px;">
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function showimage() {
			var link = document.getElementById('inputImage').value;
			document.getElementById('imgNewProd').src=link;	
		}
	</script>
</div>

@endsection