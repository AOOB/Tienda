@extends('inicio')

@section('title', 'Crazy Roach')
@section('encabezado')
@endsection

@section('contenido')

<div class="row col-md-11" >
 @foreach($prod as $p)
	<div class="col-md-3" >
		<div class="thumbnail"  style="width: 200px; height:250px; ">
  			<img src="{{ $p->image }}" style="width: 200px; height:150px;">
  				<div class="caption" style="  overflow: auto; background: #ffffff "> 
    				<div align="center">
    					<label style="color: #ff1493; font-size: 23px; ">{{ $p->name }}</label>
    					<h4 style="margin-top: 15px;">Precio: $ {{ $p->price * 1 }}</h4>
	    			</div>
  				</div>	
		</div>
	</div>
	@endforeach
</div>
@endsection