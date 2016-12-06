@extends('inicio')

@section('title', 'Crazy Roach')
@section('encabezado')
@endsection

@section('contenido')

<!--Carrusel-->
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/slide1.jpg">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/slide2.jpg" >
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/slide3.jpg">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev" height=300 width=800>
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next" height=300 width=800>
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div><br><br><br>
                
   <!-- Categorias -->
 
    <div id="separador" style="background-color: #efefef;" align="center">
        <h3>Categorías</h3> 
    </div>

    <div class="row col-md-9" >
        @foreach ($dataCates as $dc)
       <div class="col-sm-6 col-md-3">
            <div class="thumbnail"  style="width: 200px; height:280px; ">
                <a href="{{ url('/Productos') }}/{{ $dc->id }} "><img src="{{ $dc->image }}" style="height: 200px; width: 200px;"> </a>
               <div class="caption" style="  overflow: auto; background: #ffffff "> 
                    <div align="center">
                        <label style="color: #ff1493; font-size: 17px; ">{{ $dc->name }}</label>
                    </div>
                </div>  
                
             </div>
        </div>
        @endforeach
    </div>



    <!-- FAVORITOS -->
    <div id="separador" class="row col-md-12" style="background-color: #efefef; margin-top: 50px;" align="center">
        <h3>Más vendidos</h3> 
    </div>
   <div class="row col-md-9" >
        @foreach ($produc as $p)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail"  style="width: 200px; height:280px; ">
                <a href="{{ url('/Producto')}}/{{$p->id}}"><img src="{{ $p->image }}" style="height: 200px; width: 200px; border: solid 5px #eee;"></a>
                    <div class="caption" style="  overflow: auto; background: #ffffff "> 
                        <div align="center">
                            <label style="color: #ff1493; font-size: 17px; ">{{ $p->name }}</label>
                            <h4>$ {{ $p->price * 1 }}</h4>
                        </div>
                    </div>  
            </div>
        </div>
        @endforeach
    </div>









@endsection