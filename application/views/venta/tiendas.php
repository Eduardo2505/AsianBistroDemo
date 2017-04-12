
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


								<script type="text/javascript">

									$(document).ready(function() {
										$(".bscategiria").click(function(event) {
											var idCategoria = $(this).attr("title");
											// alert(idCategoria);
											$("#menuSubcategorias").load('../venta/Subcategiras/'+idCategoria);

											$("#Productosmostrar").html('<img id="ayudaImg" src="../style/tiposPagos/ayuda.png" alt="Ayuda"/>');

										});
									});
									</script>




					</li>
					<?php
								if (isset($categorias)) {
									foreach($categorias->result() as $row)
									{
										?>
										<li>
											<a href="#" title="<?= $row->idCategoria;?>" class="bscategiria"><?= $row->Categoria;?></a>

										</li>


										<?php
									}
								}
								?>


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
<?php
								if (isset($categorias)) {
									foreach($categorias->result() as $rows)
									{
										?>
										<li class="nav-item">
											<a href="#" title="<?= $rows->idCategoria;?>" class="bscategiria"><?= $rows->Categoria;?></a>

										</li>


										<?php
									}
								}
								?>
				
					
				
			</ul>
		</div>
	</div>




		<div  style="height:10%"></div>

		<!--<section id="second-menu" id="shop" class="section-scroll main-section menu">-->
		<section id="shop" class="section-scroll main-section menu shop ">
			<ul class="list-category">
				<samp id="menuSubcategorias">
					<li>

					</li>
				</samp>
				<li class="shop-list">
					<ul>


						<li class="shopping-cart">
							<a href="<?php echo site_url('venta/Shopping') ?>" class="cart">CARRITO</a>
							<ul class="show-cart" id="carritoviwe">
<?php
$totalventa=0;
	if (isset($pedidos)) {
		foreach($pedidos->result() as $row)
		{
			?>

			                   <li class="product">

									<div class="list-product">
										<h5><?= $row->Nombre;?></h5>
										
										<div class="quantity"><?= $row->cantidad;?></div>
										<?php
										$tprecio=($row->cantidad)*($row->precio);
										$totalventa+=$tprecio;
										?>
										<div class="price-product">$<?=$tprecio;?></div>
										<div class="remove-product"><i class="icon-close"></i></div>
									</div>
								</li>




			<?php
		}
	}

	?>
	                            <li class="summation">

									<div class="btn-cart">
									<div class="summation-subtotal">
										<span style="color:red">Subtotal:</span>
										<span class="amount" style="color:red">$<?=$totalventa?></span>
									</div>
										<button class="btn btn-default"><a href="<?php echo site_url('venta/Shopping') ?>">Comprar</a></button>

									</div>
								</li>


							</ul>
						</li>
					</ul>
				</li>
			</ul>


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
							<h2>SELECIONE UNA CATEGORIA</h2>
						</div>
					</div>





					<div class="row">




					<?php
								if (isset($categorias)) {
									foreach($categorias->result() as $row)
									{
										?>


						<div class="menu-item">
							<a href="#" title="<?= $row->idCategoria;?>" class="hidden-xs unveil bscategiria">
								<figure>
									<img src="../img/placeholder.png" data-src="../img/categorias/<?= $row->url;?>" alt="Menu item"/>

								</figure>
							</a>
							<div class="item-description">
								<div class="">

								 <div class="" >

										<h1><button  style="border:0;outline:0 none;" title="<?= $row->idCategoria;?>" class="bscategiria"><?= $row->Categoria;?> </button></h1>
										</div>



									</div>
								</div>
							</div>


										<?php
									}
								}
								?>
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
