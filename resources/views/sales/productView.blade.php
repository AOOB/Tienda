@extends('inicio')
@section('title', 'Sesion Administrador.')
@section('encabezado')
@endsection

@section('contenido')
<div>
  <div class="row">
    <div class="col-md-6">
      <fieldset><legend>Especificación del Producto</legend></fieldset>
          <div class="row">
            <div class="col-md-5" ;">
              <div class="row" style="border-bottom: 1px solid;" align="center">
                Especifcaciones
              </div>
              <b>Nombre:</b> <br> 
              {{ $dataProduct->name }}
              <br><br>
              <b>Descripción:</b> <br> 
              {{ $dataProduct->description }}             
            </div>
            <div class="col-md-7" align="center">
              <img src="{{ $dataProduct->image }}" width="100%">
            </div>
          </div>
          <div class="row" style="background: #efefef; margin-top: 1%;">
              Quizá te interese...
          </div>
          <div class="row">
            @foreach ($similarProducts as $similarProduct)
              <div class="col-md-4">
                <div class="row">{{ $similarProduct->name }}</div>
                <div class="row"><a href="{{url('/Producto')}}/{{ $similarProduct->id }}"><img class="img-rounded" src="{{ $similarProduct->image }}" width="100%"></img></div></a>
                <div class="row" align="center">${{ $similarProduct->price * 1}}</div>
              </div> 
            @endforeach
          </div>
    </div>
    <div class="col-md-6">
      <fieldset><legend>Datos de la compra</legend></fieldset>  
      <form  class="form-horizontal" action="{{ url('/AddToCart') }}">
        <div class="col-md-12" style="height: 400px;  border-radius: 5px; border-color: #e9e9e9;" >
          <div class="row form-group" style="border-bottom: 1px solid;">
            <div class="col-md-7">
              <label class="control-label"> Precio: </label> 
              <br>
              <label class="control-label"> Descuento: </label>
              <br>
              <label class="control-label"> Precio final: </label>
            </div>
            <div class="col-md-5">
              <label class="control-label"> ${{ $dataProduct->price * 1 }} </label> 
              <br>
              <label class="control-label"> {{ $dataProduct->discount }}% </label> 
              <br>
              @if ($dataProduct->discount > 0)
              <label class="control-label" style="color: red;"> ${{ $dataProduct->price - ($dataProduct->price * ($dataProduct->discount / 100)) }} </label> 
              @else
              <label class="control-label"> ${{ $dataProduct->price * 1 }} </label>               
              @endif
            </div>  
          </div>
          <br>
          <div class="row form-group">
           <label class="control-label"> Método de pago: </label>
              
              <select class="form-control" name="inpuMethod"> 
                <option>Tarjeta</option>
                <option>Recojer en tienda</option>
              </select> 
          </div>
          <br>
          
          <div class=" form-group">
            <div class="col-md-5">
              <label for="inpurQuantity" class="control-label">Cantiad:</label>
              <input class="form-control" onchange="" type="number"  name="inputQuantity" id="inputQuantity" min="1" value="1" max="999" style="max-width: 70%">
              <input type="hidden" name="inputPrice" value="{{$dataProduct->price}}">
              <input type="hidden" name="inputDiscount" value="{{$dataProduct->dicount}}">
              <input type="hidden" name="inputProductId" value="{{ $dataProduct->id }}">
            </div>

          </div>
          <div class="row">
            <button class="btn btn-success" type="submit"> Agragar al carrito </button>
          </div>
        </form>  
        
          @if ( !Auth::guest() )
          <form action="{{ url('/voteProduct') }}">
          <div class="col-md-7">
              <label>Clificar Producto:</label> <br>
              <label>Clificación actual: {{ $dataProduct->valoration }} estrella(s) de 5 </label> 
              
              @if (count ($checkIfCanVote) > 0)
              <div class="row ec-stars-wrapper">
                <a onclick="putCalification(1)" data-value="1" id="1" title="Votar con 1 estrellas">&#9733;</a>
                <a onclick="putCalification(2)" data-value="2" id="2" title="Votar con 2 estrellas">&#9733;</a>
                <a onclick="putCalification(3)" data-value="3" id="3" title="Votar con 3 estrellas">&#9733;</a>
                <a onclick="putCalification(4)" data-value="4" id="4" title="Votar con 4 estrellas">&#9733;</a>
                <a onclick="putCalification(5)" data-value="5" id="5" title="Votar con 5 estrellas">&#9733;</a>
              </div>

              
               <input type="hidden" name="inputValoration" id="inputValoration" value="">
               <input type="hidden" name="inputProductId" value="{{ $dataProduct->id }}">
               <button type="submit" class="btn btn-success">Ya haz comprado este producto, calificalo!</button>
              @endif
            </div> 
            </form>
          @else
          <div class="row">
            <label class="control-label"> Registrate para comprar y valorar este producto </label>
          </div>
          @endif
        </div>
    </div>
  </div>
  <div class="row" style="margin-top: 5%;" >
    <div class="col-md-12">
      <div class="col-md-12" style="background: #efefef;" align="center">
        Comenarios
      </div>  
    </div>
    @if ( !Auth::guest() )
    <form  class="form-horizontal"  action="{{ url('/postAComment') }}">  
      <div class="col-md-12">
        <div class="row" style="margin-top: 2%">
          <div class="col-md-1">
            <img style="margin-top: 7%; margin-left: 10%;" src="{{ Auth::user()->image }}" class="img-rounded" width="70px">
          </div>
          <div class="col-md-11">
            <input type="hidden" name="inputUserId" value="{{ Auth::user()->id }}">
            <input type="hidden" name="inputProductId" value="{{ $dataProduct->id }}">
            <textarea  class="form-control" name='inputComment' placeholder="Deje un comentario"></textarea>
          </div>
        </div>
        <div class="col-md-12" align="right">
          <button class="btn btn-info"> Comentar </button>
        </div>  
      </div>
    </form>
    @endif
    <div class="col-md-12" style="margin-top: 2%;">
      <!--Si aun no hay comentarios-->
      @if (count($productComments)==0)
          <div class="col-md-12">
            <textarea  class="form-control" placeholder="No hay comentarios aún" disabled="true"></textarea>
          </div>
      @else
        @foreach ($productComments as $productComment)
          <div class="row" style="margin-top: 2%; margin-bottom: 2%">
          <div class="col-md-1">
            <img style="margin-top: 7%; margin-left: 10%;" src="{{ $productComment->image }}" class="img-rounded" width="70px">
          </div>
          <div class="col-md-11">
            <textarea  class="form-control" readonly="true" style="resize: none;">{{ $productComment->comment }}</textarea>
          </div>
          </div>
        @endforeach
      @endif
      <!--Si y hay comentarios-->
    </div>
  </div>

  
</div>
<script type="text/javascript">
 function putCalification(valoration) { 
    document.getElementById('inputValoration').value=valoration;
    console.log(valoration);
    for (var i = 1; i <= 5; i++) {
      if (i<=valoration){
        document.getElementById(i).style.color="rgb(39, 130, 228)";  
        continue;
      }
        document.getElementById(i).style.color ="#888";         
      
    }
  }
</script>
@endsection