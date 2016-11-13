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
        <h3>Categorias</h3> 
    </div>
    <div class="row" style="margin-bottom: 50px;"><br>
        @foreach ($dataCates as $dc)
        <div class="col-sm-6 col-md-2">
            <div>
                <div class="caption" style=" text-align: center;">
                <a href=""><img src="{{ $dc->image }}" style="height: 200px; width: 200px; border: solid 5px #eee;">
                    <h3>{{ $dc->name }}</h3>
                </a>
                </div>
             </div>
        </div>
        @endforeach
    </div>

    <!-- FAVORITOS -->
    <div id="separador" class="row col-md-12" style="background-color: #efefef; margin-top: 50px;" align="center">
        <h3>Mas vendidos</h3> 
    </div>
    <div class="row" style="margin-bottom: 100px; margin-top: 150px;"><br>
        @foreach ($produc as $p)
        <div class="col-sm-6 col-md-2">
            <div>
                <div class="caption" style="text-align: center;">
                <a href="{{ url('/Producto')}}/{{$p->id}}"><img src="{{ $p->image }}" style="height: 200px; width: 200px; border: solid 5px #eee;">
                    <h3>{{ $p->name }}</h3>
                </a>
                <h4>{{ $p->price * 1 }}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>









@endsection