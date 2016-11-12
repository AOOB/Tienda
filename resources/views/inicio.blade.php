 <!DOCTYPE HTML>
<html>
<head>
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
		      	@if (Auth::guest())
			    <li><a href="#"><img class="img-circle" src="https://lh5.googleusercontent.com/--UmpxNXAfc8/AAAAAAAAAAI/AAAAAAAAAp4/tkBsp4GXv6U/photo.jpg" width="25px" height="25px"><br><span>Invitado</span><span class="fa fa-angle-right" style="float: right"></span></a>
	        		<ul>
	         		 	<li>
                            <a href="{{ url('/Login') }}">
                            Logeate
                            </a>
                        </li>
	        	  	</ul>
	     	    </li>			
		        <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Tienda</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
			            <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
		             </ul>
		        </li>
		        <li><a href="#"><i class="fa fa-cogs"></i><span>Components</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="grids.html">Grids</a></li>
		            <li><a href="portlet.html">Portlets</a></li>		            
		          </ul>
		        </li>
		        <li><a href="maps.html"><i class="fa fa-map-marker"></i><span>Maps</span></a></li>
		        
		        <li><a href="#"><i class="fa fa-envelope"></i><span>Contactanos!</span></a> </li>
		         
		         @else
		         <li><a href="#"><img class="img-circle" src="{{ Auth::user()->image }}" width="35px" height="35px"><br><span>{{ Auth::user()->name }}</span><span class="fa fa-angle-right" style="float: right"></span></a>
	        		<ul>
	         		 	<li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
	        	  	</ul>
	     	    </li>
	     	    <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Tienda</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
			            <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
		            </ul>
		        </li>			
		        <li><a href="{{ url('/perfil')}}/{{Auth::user()->id }}"><i class="fa fa-cogs"></i><span>Configuración del Perfil</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        </li>
			    @if (  Auth::user()->accesscontrol  == '1' )
			        <li id="menu-comunicacao" ><a href="{{url('/tryToIntoSectionAdmin')}}/{{Auth::user()->email}}"><i class="fa fa-book nav_icon"></i><span>Admin Panel.</span><span class="fa fa-angle-right" style="float: right"></span></a>
			          <ul id="menu-comunicacao-sub" >
			            <li id="menu-mensagens" style="width: 120px" ><a href="buttons.html">Buttons</a>		              
			            </li>
			            <li id="menu-arquivos" ><a href="typography.html">Typography</a></li>
			            <li id="menu-arquivos" ><a href="icons.html">Icons</a></li>
			          </ul>
			        </li>
			    @endif    
		          <li><a href="maps.html"><i class="fa fa-map-marker"></i><span>Maps</span></a></li>
		        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Pages</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-academico-sub" >
		          	 <li id="menu-academico-boletim" ><a href="login.html">Login</a></li>
		            <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>		           
		          </ul>
		        </li>
   			    @if (  Auth::user()->accesscontrol  == '1' )
			        <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span></a></li>
		 		@endif
		         <li><a href="#"><i class="fa fa-envelope"></i><span>Contactanos!</span></a> </li>
		         <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Productos</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li><a href="price.html">Price</a>
			            </li>
		             </ul>
		         </li>
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
    $("#menu span").css({"position":"absolute"});});
$(".sidebar-icon").click(function() {                
  if (toggle)
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
</html>                     