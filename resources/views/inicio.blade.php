 <!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
.ec-stars-wrapper a {
	text-decoration: none;
	display: inline-block;
	/* Volver a dar tamaño al texto */
	font-size: 32px;
	font-size: 2rem;
	
	color: #888;
}

</style>
<title>Crazy Roach</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{ url('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{ url('js/jquery-2.1.1.min.js') }}"></script> 
<script src="{{ url('js/stuff.js') }}"></script> 
<!--icons-css-->
<link href="{{ url('css/font-awesome.css') }}" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="{{ url('js/Chart.min.js') }}"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="{{ url('js/chartinator.js') }}" ></script>
    <script type="text/javascript">
 <!--//SESION-->
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<!--skycons-icons-->
<script src="{{ url('js/skycons.js') }}"></script>
<!--//skycons-icons-->
</head>
<body>	
<div style="min-height: 700px;" class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
						<div class="logo-name">
							<a href="{{url('/principal')}}">  
								<img src="{{ url('images/logoo.png') }}" width="120" height="50">
							</a> 								
						</div>
							<!--search-box-->
								<div class="search-box" style="margin-left: 50px;">
									<form>
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
				<div class="container">
					<div class="row">

	            		<div class="col-xs-12">
	            			@yield('encabezado')
	            		</div>
	            			@yield('contenido')

	        		</div>
	        	</div>
<!--heder end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		      	<?php
			      
		      	?>
		      	<li><a href="{{ url('/ListaProductos') }}"><i class="fa fa-shopping-cart"></i><span>{{Cart::count()}}</span></a></li> 
		      	@if (Auth::guest())

			    <li><a href="#"><img class="img-circle" src="https://lh5.googleusercontent.com/--UmpxNXAfc8/AAAAAAAAAAI/AAAAAAAAAp4/tkBsp4GXv6U/photo.jpg" width="25px" height="25px"><br><span>Invitado</span><span class="fa fa-angle-right" style="float: right"></span></a>
	        		<ul>
	         		 	<li>
                            <a href="{{ url('/Login') }}">
                            Logeate
                            </a>
                        </li>
                         <li ><a href="{{url('/Registro')}}">Sign Up</a></li>
	        	  	</ul>
	     	    </li>			
		        <li><a href="#"><i class="fa fa-shopping-basket"></i><span>Tienda</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="{{url('/TodosLosProductos')}}">Product</a></li>
		            </ul>
		        </li>
		        
		        
		         @else
		         <li><a href="#"><img class="img-circle" src="{{ Auth::user()->image }}" width="35px" height="35px"><br><span>{{ Auth::user()->name }}</span><span class="fa fa-angle-right" style="float: right"></span></a>
	        		<ul>
	         		 	<li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
	        	  	</ul>
	     	    </li>
   		        <li><a href="#"><i class="fa fa-shopping-basket"></i><span>Tienda</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="{{url('/TodosLosProductos')}}">Product</a></li>
		            </ul>
		        </li>			
		        <li><a href="{{ url('/perfil')}}/{{Auth::user()->id }}"><i class="fa fa-cogs"></i><span>Configuración del Perfil</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        </li>
			    @if (  Auth::user()->accesscontrol  == '1' )
			        <li id="menu-comunicacao" ><a href="{{url('/tryToIntoSectionAdmin')}}/{{Auth::user()->email}}"><i class="fa fa-book nav_icon"></i><span>Admin Panel.</span><span class="fa fa-angle-right" style="float: right"></span></a>
			        </li>
			    @endif    
		         
			        <li><a href="{{ url('/Compras') }}/{{base64_encode(Auth::user()->id)}}"><i class="fa fa-bar-chart"></i><span>Reporte de Compras</span></a></li>
		         
		         @endif
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
	<!--slide bar menu end here-->
</div>

<script>
var toggle = false;
$(document).ready(function() { $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"}); });
$(".sidebar-icon").click(function() {                
  if (!toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
<footer style="background: #202121">
<div class="row">
	<div class=col-md-2>
		<a href="{{url('/principal')}}">  
			<img src="{{ url('images/pie.png') }}" width="200" height="150">
		</a> 
	</div>
	<div class=col-md-3>
	<p style="font-family: sans-serif; font-size: 14; color: #ffffff; text-align: center; margin-top: 30px;">La biblioteca actual de CrazyRoach incluye videojuegos aptos para diferentes personas algunos demos y muchos otros de paga, ademas de videojuegos fisicos y objetos de diferentes tipos.</p>
	</div>
	<div class=col-md-3>
		<label style="color: #ffffff; font-family: sans-serif; font-size: 30;margin-top: 30px;">Compañia</label><br>
		<a href="{{url('/Registro')}}" style=" border-top: thin dotted; border-top-color: #ffffff;">
			Conviertete en afiliado
		</a> 
	</div>
</div>
</footer> 
</html>                     