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
<body class="intro-fullscreen fixed-footer scroll-down yo-anim-enabled" style="padding-top:0">

	

		<!--<section id="second-menu" id="shop" class="section-scroll main-section menu">-->
		<section id="shop" class="section-scroll main-section menu shop " style="padding-top:0">
			<div class="container-fluid menu-content mixitup ">

			<!--#######  Categoria##############-->
			<style type="text/css">
			#ayudaImg {
				height: auto;
				max-width: 100%;				
				}

			</style>

				<div class="mix category-1" data-myorder="1" id="Productosmostrar" style="text-align:center;padding-top:0%;margin-top: 0%">

					<div class="row">
						<div class="col-xs-12 menu-category sticky-header sticky-header first-header fixed visible">
							<h2>EXTRAS
							<a href="<?php echo site_url('venta/Shopping') ?>" class="cart">
							<img src="../style/tiposPagos/carrito.png" id="ayudaImg" alt=""></a>
							</h2>
						</div>
						<div style="display:none" id="verDatitos"></div>
					</div>





					<script type="text/javascript">
	$(document).ready(function() {
		$(".addproducto").click(function(event) {
			var url = $(this).attr("title");
			var name = $(this).attr("name");
			var cantida =String($("#"+name).val());

			var urlpro = url+cantida;
		   if(cantida==''||cantida=='0'){
				error();
			}else{
			$("#verDatitos").load('../venta/addPedido/'+urlpro);
			ok();
}

		});
	});
	function ok(){
		alertify.success("Se agrego Correctamente <a href=\"<?php echo site_url('venta/Shopping') ?>\" style=\"color:white;\"><b>COMPRAS</b></a>");
		return false;
	}
  function error(){
        //una notificación de error
      alertify.error("La cantidad debe de ser mayor a 0"); 
      return false; 
   }
	function ValidaSoloNumeros() {
		if ((event.keyCode < 48) || (event.keyCode > 57))
			event.returnValue = false;
	}
</script>





<style>
	.wrapper {
		overflow: hidden;
		padding: 1% 0 4% 0;
	}

/************************************************************************************
COLUMN
*************************************************************************************/
.col {

	float: left;
	margin-left: 3.2%;
	margin-bottom: 30px;
	height:330px;
	padding-top: 3%;

}

.fullwidth .col {
	float: none;
	margin-left: 0;
}
/* grid4 col */
.grid4 .col {
	width: 22.6%;
}
/* grid3 col */
.grid3 .col {
	width: 31.2%;
}
/* grid2 col */
.grid2 .col {
	width: 48.4%;
}
/* clear col */
.grid4 .col:nth-of-type(4n+1),
.grid3 .col:nth-of-type(3n+1),
.grid2 .col:nth-of-type(2n+1) {
	margin-left: 0;
	clear: left;
}
/* reset cols to fullwidth */
@media screen and (max-width: 400px) {
	/* grid4 */
	.col {
		width: 100% !important;
		margin-left: 0 !important;
		clear: none !important;
	}
}
.titulo{
	color: #4E4E4E;
	padding: 1% 1% 1% 1%;
	font-weight: bold;
}
.titulo2{
	color: #4E4E4E;
	padding: 1% 1% 1% 1%;
	font-weight: bold;
	font-size:14px;
	padding: 2% 6% 10% 6% ;
	text­align: justify;
}
.precio{
	color: red;
	font-size: 23px;

	font-weight: bold;

}
</style>
<div class="row items-content">
	<div class="wrapper grid4">
		<?php
		$par=2;
		$color="";
		if (isset($productos)) {
			foreach($productos->result() as $row)
			{

				?>


				<article class="col" style="background: #eee;">


					<div class="titulo"><?= $row->Nombre;?></div>
					<div class="precio">$<?= $row->precio;?></div>

					<div class="titulo2"><?= $row->Descripcion;?><div class="titulo">




						<input type="tel" onkeypress="ValidaSoloNumeros()" maxlength="2" id="<?= $row->idProducto;?>" placeholder="Cantidad">
						<div class="shop-button"><a href="#" name="<?= $row->idProducto;?>" title="<?= $row->idProducto;?>/<?= $row->precio;?>/" class="btn btn-default btn-sm addproducto">Agregar</a></div>

						<br>
					</article>




					<?php
					$par++;
				}
			}
			?>
		</div>
	</div>


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
