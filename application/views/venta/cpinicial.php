
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Carrito Online</title>
	<meta name="description" content="">
	<meta name="msapplication-tap-highlight" content="yes" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../css/custom.css">
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?sensor=false&amp;ver=3.0'></script>

</head>
<body class="intro-fullscreen fixed-footer scroll-down yo-anim-enabled">

	<!--content-->


	<nav id="main-navbar" class="hidden-xs hidden-sm">
		<div class="nav hidden-xs">
			<div class="main-reorder pull-right">

			</div>

			<div class="logo pull-left">
				<a href="http://asianbistro.mx/">
					<figure>
						<img src="../img/logo1.png" class="light-logo" alt="Asian Bistro"/>
						<img src="../img/logo2.png" class="dark-logo" alt="Asian Bistro"/>
					</figure>
				</a>
			</div>
			<div class="main-nav">
				<ul class="pull-right">
					<li>
						<a href="http://asianbistro.mx/" class=" active   ">INICIO</a>
					</ul>
				</div>
			</div>
		</nav>
		<div id="mobile-nav" class="visible-xs visible-sm">
		<header>
			<div class="container-fluid">
				<ul class="menu-header">
					<li class="pull-left">
						<a href="http://asianbistro.mx/" class="logo">
							<figure>
								<img src="../img/logo2.png" alt="Berg HTML Theme"/>
							</figure>
						</a>
					</li>
					<li class="reorder pull-right"><a href="#" title=""><i class="fa fa-bars"></i></a></li>
				</ul>
			</div>
		</header>
		<div class="" id="flyout-container">
			<ul id="mobile-navbar" class="nav flyout-menu main-nav nav-height">
				<li class="nav-item">
					<a title="" href="http://asianbistro.mx/">INICIO</a>
				</li>

				
					
				
			</ul>
		</div>
	</div>




		<div  style="height:10%"></div>

		<!--<section id="second-menu" id="shop" class="section-scroll main-section menu">-->
		<section id="shop" class="section-scroll main-section menu shop ">
		


			<div class="container-fluid menu-content mixitup ">

			<!--#######  Categoria##############-->
			<style type="text/css">
			#ayudaImg {
				height: auto;
				max-width: 100%;
				}
			</style>

				<div class="mix category-1" data-myorder="1" id="Productosmostrar" style="text-align:center">

					<div class="row">
						<div class="col-xs-12 menu-category sticky-header sticky-header first-header fixed visible">
							<h2>DONDE TE ENCUENTRAS</h2>
						</div>
					</div>

<script type="text/javascript">
	
	function ValidaSoloNumeros() {
		if ((event.keyCode < 48) || (event.keyCode > 57))
			event.returnValue = false;
	}


	$(document).ready(function() {
						//$('#formulacliendiv').hide();
						//$('#btnsumbit').hide();

						$("#cp").keyup(function(event) {

							var strin=$(this).val();
							var inres =strin.length;					
							var cp =parseInt(strin);
							if(inres==5){
							//  alert(inres);
							
							
								 $("#mresult").load('../venta/bucarCP/'+cp);
							}else{
								$("#mresult").html("");

							}


							});
					});



        $(document).ready(function() {
                $('#form1').submit(function() {
                    var data = $(this).serialize();
                   
                    var colo = $("#colonia").val().toString();  
                    var del = $("#delegacion").val().toString();   
                    if(colo!=""&&del!=""){ 
                    //alert(data);                  
                    $.post('<?php echo site_url("") ?>venta/sessioncol', data, function(respuesta) {

                    	 $(location).attr('href',"<?php echo site_url("") ?>venta/VentOnlineCp"); 
                     
						//$('#respuesta').html(respuesta);
                      
                        
                         

                    });}else{

                    	$('#errorColona').html("NO hay ninguna colonia");

                    	//alert();
                    }


                    return false;
                });
            });
</script>
<style type="text/css">

@import url(http://fonts.googleapis.com/css?family=Montserrat:400,700);

html{    background:url(http://thekitemap.com/images/feedback-img.jpg) no-repeat;
  background-size: cover;
  height:100%;
}

#feedback-page{
	text-align:center;
}

#form-main{
	width:100%;
	float:left;
	padding-top:0px;
}

#form-div {
	background-color:rgba(72,72,72,0.4);
	padding-left:35px;
	padding-right:35px;
	padding-top:35px;
	padding-bottom:50px;
	width: 450px;
	float: left;
	left: 50%;
	
  margin-top:30px;
	margin-left: -260px;
  -moz-border-radius: 7px;
  -webkit-border-radius: 7px;
}

.feedback-input {
	color:#3c3c3c;
	font-family: Helvetica, Arial, sans-serif;
  font-weight:500;
	font-size: 18px;
	border-radius: 0;
	line-height: 22px;
	background-color: #fbfbfb;
	padding: 13px 13px 13px 54px;
	margin-bottom: 10px;
	width:100%;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
  border: 3px solid rgba(0,0,0,0);
}

.feedback-input:focus{
	background: #fff;
	box-shadow: 0;
	border: 3px solid #3498db;
	color: #3498db;
	outline: none;
  padding: 13px 13px 13px 54px;
}

.focused{
	color:#30aed6;
	border:#30aed6 solid 3px;
}

/* Icons ---------------------------------- */
#name{
	background-image: url(http://rexkirby.com/kirbyandson/images/name.svg);
	background-size: 30px 30px;
	background-position: 11px 8px;
	background-repeat: no-repeat;
}

#name:focus{
	background-image: url(http://rexkirby.com/kirbyandson/images/name.svg);
	background-size: 30px 30px;
	background-position: 8px 5px;
  background-position: 11px 8px;
	background-repeat: no-repeat;
}

#email{
	background-image: url(http://rexkirby.com/kirbyandson/images/email.svg);
	background-size: 30px 30px;
	background-position: 11px 8px;
	background-repeat: no-repeat;
}

#email:focus{
	background-image: url(http://rexkirby.com/kirbyandson/images/email.svg);
	background-size: 30px 30px;
  background-position: 11px 8px;
	background-repeat: no-repeat;
}

#comment{
	background-image: url(http://rexkirby.com/kirbyandson/images/comment.svg);
	background-size: 30px 30px;
	background-position: 11px 8px;
	background-repeat: no-repeat;
}

textarea {
    width: 100%;
    height: 150px;
    line-height: 150%;
    resize:vertical;
}

input:hover, textarea:hover,
input:focus, textarea:focus {
	background-color:white;
}

#button-blue{
	font-family: 'Montserrat', Arial, Helvetica, sans-serif;
	float:left;
	width: 100%;
	border: #fbfbfb solid 4px;
	cursor:pointer;
	background-color: #3498db;
	color:white;
	font-size:24px;
	padding-top:22px;
	padding-bottom:22px;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}

#button-blue:hover{
	background-color: rgba(0,0,0,0);
	color: #0493bd;
}
	
.submit:hover {
	color: #3498db;
}
	
.ease {
	width: 0px;
	height: 74px;
	background-color: #fbfbfb;
	-webkit-transition: .3s ease;
	-moz-transition: .3s ease;
	-o-transition: .3s ease;
	-ms-transition: .3s ease;
	transition: .3s ease;
}

.submit:hover .ease{
  width:100%;
  background-color:white;
}

@media only screen and (max-width: 580px) {
	#form-div{
		left: 3%;
		margin-right: 3%;
		width: 88%;
		margin-left: 0;
		padding-left: 3%;
		padding-right: 3%;
	}

	
}
@media only screen and (max-width: 980px) {
	

	#divbuscar{		
		padding-left: 5%;
		padding-right: 5%;
	}
	#divtop{		
		padding-top: 5%;
	}
}

@media only screen and (min-width: 980px) {
	

	#divbuscar{		
		padding-left: 35%;
		padding-right: 35%;
	}
	#divtop{		
		padding-top: 3%;
	}
}
</style>



					<div class="row"  id="divtop">




				
					<div id="form-main">
  <div id="divbuscar">
  <h3>Ingresa tú C.P. de entrega</h3>
    <form class="form" id="form1">
      
      <p class="name">
        <input name="cp" required id="cp" type="tel" onkeypress="ValidaSoloNumeros()" maxlength="5" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Código Postal"  />
      </p>
      <spam style="color:red;font-zise:20px;background-color:yellow" id="errorColona">
      	
      </spam>
      
      <div id="mresult">
      <input type="hidden"  name="colonia" id="colonia" required>
	  <input type="hidden"  name="delegacion" id="delegacion" required>
      </div>
      
      <div class="submit" >
       <input type="submit" value="ACEPTAR" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form><br>
<img src="<?php echo site_url("") ?>img/take.png"><br>
    Si deseas realizar tú pedido y recoger en tienda seleccione la sucursal a la que desea pasar
<h3>Surcursales</h3>


<?php

	if (isset($sucursales)) {
		foreach($sucursales->result() as $row)
		{
			?>
            <a href="<?php echo site_url("") ?>venta/sessionsucursal?nom=<?php echo $row->Sucursal?>&idSucursal=<?php echo $row->idSucursal ?>" class="btn "><?php echo  $row->Sucursal;?></a><br>




			<?php
		}
	}

	?>
  </div>
 			
<BR>

<br><br>
<BR>
<BR>


						<!-- #####fin producto####### -->
					</div>

<!--####### fin Categoria##############-->
				</div>



		</section>


		<div id="footer-spacer"></div>
		<footer id="footer" class="text-center">

	<a href="#" class="to-the-top">
		<i class="fa fa-arrow-circle-o-up"></i>
	</a>

	<h2>Asian Bistro</h2>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center v-card">

					<div class="col-sm-6 col-lg-3">
						<div class="open-daily">
							<span class="day">Lunes - Miércoles</span>
							<span class="hours">13.00 - 23.00</span>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="open-daily">
							<span class="day">Jueves - Sábados</span>
							<span class="hours">13.00 - 00.00</span>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="simple-contact">
							<span class="day">Domingos</span>
							<span class="hours">13.00 - 22.00</span>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="simple-contact">
							<span class="mobile"><a href="tel:525555504923">+55 50 49 23</a></span>
							<span class="email"><a href="<?php echo site_url('navegar/Contacto') ?>">DireccionAsianBistro@SushiRoll.mx</a></span>
						</div>
					</div>

			</div>
		</div>
	</div>
			<ul class="social-icon clearfix">
				<li>
					<a href="www.facebook.com/AsianBistroMx"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="www.twitter.com/AsianBistromx"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-google-plus"></i></a>
				</li>
			</ul>


	<p class="copyrights">© 2006 Asian Bistro. Derechos Reservados. <a href="<?php echo site_url('navegar/PoliticasDePrivacidad') ?>"> Políticas de Privacidad</a></p>
</footer>
		<div class="gallery-wrapper"></div>

		<div id="preloader">
			<div id="status">
				<div class="loading-wrapper">
					<img src="../img/logo2.png" alt="Loading"/>
				</div>
			</div>
			<div id="status-loaded"></div>
		</div>

		<script src="../js/browser.js"></script>
		<script src="../js/jquery.ba-throttle-debounce.min.js"></script>
		<script src="../js/jquery.smooth-scroll.js"></script>
		<script src="../js/matchmedia.js"></script>
		<script src="../js/enquire.min.js"></script>
		<script src="../js/jquery.velocity.min.js"></script>
		<script src="../js/waypoints.js"></script>
		<script src="../js/owl.carousel.js"></script>
		<script src="../js/jquery.mb.YTPlayer.js"></script>
		<script src="../js/jquery.parallaxify.js"></script>
		<script src="../js/jquery.imagesloaded.js"></script>
		<script src="../js/jquery.unveil.min.js"></script>
		<script src="../js/jquery.superslides.min.js"></script>
		<script src="../js/jquery.fullPage.min.js"></script>
		<script src="../js/jquery.mixitup.js"></script>
		<script src="../js/main.js"></script>
		<!--<script src="js/jquery.min.js"></script>-->
		<!-- Notificaciones -->
	    <script type="text/javascript" src="../style/lib/alertify.js"></script>
		<link rel="stylesheet" href="../style/themes/alertify.core.css" />
		<link rel="stylesheet" href="../style/themes/alertify.default.css" />
	</body>
	</html>
