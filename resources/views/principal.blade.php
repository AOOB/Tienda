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
                </div>


@endsection