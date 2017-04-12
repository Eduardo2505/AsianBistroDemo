<!DOCTYPE html>
<html class="no-js" lang="es">
<head>

	<title>enviar</title>
	<META NAME="Description" CONTENT="Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro">
		<META NAME="keywords" CONTENT="Description" CONTENT="Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro">
			<META NAME=GENERATOR CONTENT="Description" CONTENT="Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



				<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
				<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
				<!--		 Place favicon.ico and apple-touch-icon.png in the root directory -->
				<link rel="stylesheet" href="../css/custom.css">
				<script src="../js/jquery-2.1.0.min.js"></script>
				<script src="../js/modernizr-2.6.2.min.js"></script>
				<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?sensor=false&amp;ver=3.0'></script>




				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>




			</head>

			<body class="intro-fullscreen fixed-footer scroll-down yo-anim-enabled">

				<!--content-->
<input type="text" value="<?php echo $idpedido; ?>" id="idproducto">
				<div id="recargarrefres" >
	
</div>

				<div id="mobile-nav" class="visible-xs visible-sm">
	<header>
		<div class="container-fluid">
			<ul class="menu-header">
				<li class="pull-left">
					<a href="#" class="logo">
						<figure>
							<img src="../img/logo2.png" alt="Asian Bistro"/>
						</figure>
					</a>
				</li>
				<li class="reorder pull-right"><a href="#" title=""><i class="fa fa-bars"></i></a></li>
			</ul>
		</div>
	</header>

</div>

				<section id="contact" class="section-scroll main-section">

					<div class="contact-content container section-padding" style="text-align:center">



							<h3>No cierre ni cencele!!!</h3>


					</div>
				</section>

				<div id="footer-spacer"></div>

				<div class="gallery-wrapper"></div>

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


			</body>
			</html>

<script type="text/javascript">
	$(document).ready(function() {
		var idproducto = $("#idproducto").val().toString();
		
				 	$("#recargarrefres").load('http://essy.com.mx/ServicioAsianvistro/Imprimir.jsp?idpedido='+idproducto);
});
</script>



