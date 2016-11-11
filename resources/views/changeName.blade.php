@extends('inicio')
@section('encabezado')
@endsection

@section('contenido')

<div class="row col-md-12" style="max-height: 5%; background: #efefef;" align="center">
		Editar Datos:
		</div>
				<form method="POST"  action="{{  url('') }}">
                    {{ csrf_field() }}
					<div class="form-group">
                        <label for="name" class="col-md-4 control-label" style="text-align: right;">Nombre</label>
							<div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"><br>
							</div>
                    </div>


                    <div class="form-group">
                        <label for="lastame" class="col-md-4 control-label" style="text-align: right;">Apellido</label>
							<div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}"><br>
							</div>
                    </div>

                    <div class="form-group" >
                        <label for="email" class="col-md-4 control-label" style="text-align: right;">E-Mail</label>
							<div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"><br>
                            </div>
					</div>

    	<input type="submit" name="" value="Enviar"  style="text-align:right;">

																		
</form>





<div class="row col-md-12" style="max-height: 5%; background: #efefef;margin-top: 100px;" align="center" >
		Metodo de pago.
		</div>
@endsection
