<!DOCTYPE html>
<html id="vertodoview" class="no-js" lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shopping</title>
	<meta name="description" content="">
	<meta name="msapplication-tap-highlight" content="yes" />

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!--		 Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="../css/custom.css">
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?sensor=false&amp;ver=3.0'></script>
	<style type="text/css">

		.cart-header{
			color:#FFFFFF;
		}

		@media screen and (max-width:480px){
			body{
				background-color:#F8F8F8;

			}
			.cart-header{
				color:#FFFFFF;
			}
		}
	</style>
	
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<!-- jQuery Popup Overlay -->
	<script src="../js/jquery.popupoverlay.js"></script>
	<script>
		$(document).ready(function () {

			$('#slide').popup({
				focusdelay: 400,
				outline: true,
				vertical: 'top'
			});

		});
	</script>

	<style>
		#slide_background {
			-webkit-transition: all 0.3s 0.3s;
			-moz-transition: all 0.3s 0.3s;
			transition: all 0.3s 0.3s;
		}
		#slide,
		#slide_wrapper {
			-webkit-transition: all 0.4s;
			-moz-transition: all 0.4s;
			transition: all 0.4s;
		}
		#slide {
			-webkit-transform: translateX(0) translateY(-40%);
			-moz-transform: translateX(0) translateY(-40%);
			-ms-transform: translateX(0) translateY(-40%);
			transform: translateX(0) translateY(-40%);
		}
		.popup_visible #slide {
			-webkit-transform: translateX(0) translateY(0);
			-moz-transform: translateX(0) translateY(0);
			-ms-transform: translateX(0) translateY(0);
			transform: translateX(0) translateY(0);
		}
		.slidesub {

			font-size: 20px;
			padding: 20px;
			text-shadow: 0px -1px 0px rgba(30, 30, 30, 0.8);
			-webkit-border-radius: 30px;
			-moz-border-radius: 30px;
			border-radius: 30px;
			background: rgb(0, 108, 156);
			background: -moz-linear-gradient(90deg, rgb(0, 108, 156) 100%, rgb(126, 28, 188) 96%);
			background: -webkit-linear-gradient(90deg, rgb(0, 108, 156) 100%, rgb(126, 28, 188) 96%);
			background: -o-linear-gradient(90deg, rgb(0, 108, 156) 100%, rgb(126, 28, 188) 96%);
			background: -ms-linear-gradient(90deg, rgb(0, 108, 156) 100%, rgb(126, 28, 188) 96%);
			background: linear-gradient(0deg, rgb(0, 108, 156) 100%, rgb(126, 28, 188) 96%);
			-webkit-box-shadow: 0px 2px 1px rgba(50, 50, 50, 0.75);
			-moz-box-shadow:    0px 2px 1px rgba(50, 50, 50, 0.75);
			box-shadow:         0px 2px 1px rgba(50, 50, 50, 0.75);

		}

	</style>

</head>




<div id="slide" style="display:none;padding-top:15%">
	<div style="text-align:center" class="slidesub">
		<a title="" href="<?php echo site_url('venta/Extras') ?>" >
			<h2 style="color:#FFFFE0">¿Te gustaría agregarle alguna salsa, queso o productos a tu pedido?</h2>
		</a>
		<a title="" href="<?php echo site_url('venta/Extras') ?>" class="btn" style="background-color:yellow">
			<i class="fa fa-gift"></i> AGREGAR
		</a>

	</div>
</div>


<body class="intro-top fixed-footer yo-anim-enabled">

	<!--content-->


	<nav id="main-navbar" class="hidden-xs hidden-sm">
		<div class="nav hidden-xs">
			<div class="main-reorder pull-right">
			</div>

			<div class="logo pull-left">
				<a href="http://asianbistro.mx/">
					<figure>
						<img src="../img/logo1.png" class="light-logo" alt="Berg HTML Theme"/>
						<img src="../img/logo2.png" class="dark-logo" alt="Berg HTML Theme"/>
					</figure>
				</a>
			</div>
			<div class="main-nav">
				<ul class="pull-right">
					<li>
						<a href="http://asianbistro.mx/" class="">INICIO</a>

					</li>

					<li>

						<button class="initialism slide_open btn btn-success" style="display: none">Slide</button>
						<a href="<?php echo site_url('venta/VentOnline') ?>" class="">SEGUIR COMPRANDO</a>
					</li>


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

				<li class="nav-item">
					<a title="" href="<?php echo site_url('venta/VentOnline') ?>">SEGUIR COMPRANDO</a>
				</li>
			</ul>
		</div>
	</div>



	<div  style="height:10%"></div>

	<section id="cart" class="section-scroll main-section shop">


		<header class="section-header">
			<h2>COMPRA ONLINE</h2>
		</header>
		<div class="container-fluid">
			<div class="row">
				<div class="cart-products">
					<div class="container">
						<div class="row cart-header">
							<div class="col-xs-2 col-sm-3">
								<h5 class="product-name">Nombre</h5>
							</div>
							<div class="col-xs-3">
								<h5 class="product-price">P/U</h5>
							</div>
							<div class="col-xs-2">
								<h5 class="product-quantity">Cant</h5>
							</div>
							<div class="col-xs-3">
								<h5 class="product-subtotal">Subtotal</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<script type="text/javascript">
						$(document).ready(function() {
							suma_y_muestra();
						});
						function confirmar(){
				//un confirm
				alertify.confirm("<p>SE ACTUALIZO CORRECTAMENTE<br><br>¿DESEAS CONTINUAR CON EL PROCESO DE COMPRA?<br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
					if (e) {
						procesarVenta();
					} else { alertify.error("Puedes seguir comprando!");
				}
			});
				return false
			}

			$(document).ready(function() {
				$(".qty").blur(function(event) {
					           
					            var castring =String($(this).val());
							   
								if(castring==''||castring=='0'){
									error();							    
								}else{
									var cantidad =parseInt(castring);
									var precio = parseInt($(this).attr("title"));
									var idtotal = $(this).attr("lang");
									$("#input"+idtotal).load('../venta/updateCatidad/'+idtotal+'/'+cantidad+'/'+precio);
									var sum=cantidad*precio;
									$("#in"+idtotal).val(sum);
									$("#"+idtotal).html("$ "+sum);
									suma_y_muestra();

								}

							});
			});
			function error(){
        //una notificación de error
     		 alertify.error("La cantidad debe de ser mayor a 0"); 
     			 return false; 
  		 }
			function suma_y_muestra() {
				var sumta=0;
				$(".tcuenta").each(function(i){
					var sum =parseInt($(this).val());
					sumta+=sum

				});
				var empa=parseFloat(sumta)*.05;
				var totalsum=parseFloat(empa)+parseFloat(sumta);
				var iva=(totalsum)*.16;
				var sub=(totalsum)/1.16;

				$("#empaquespan").html("$ "+empa.toFixed(2));
				$("#summostrartotal").html("$ "+sumta);
				$("#ivaspan").html("$ "+iva.toFixed(2));
				$("#subtotalsan").html("$ "+sub.toFixed(2));
				$("#total").html("$ "+totalsum.toFixed(2));
			}

			function procesarVenta() {
				var pa = $("#summostrartotal").attr("title");
				var cantidad =parseInt(pa);

				if(cantidad<=101){
					alertify.error("LA VENTA MINIMA ES DE 100 PESOS VERIFIQUE!!!");

				}else{
					var dataString = 'total=' + cantidad;
					$.ajax({
						type: "POST",
						url: "../venta/actualizarTotal",
						data: dataString,
						success: function(data) {

						//  alert(data);
//$("#input"+il).load('../venta/updateCatidad/'+idtotal+'/'+cantidad+'/'+precio);

							$(location).attr('href',"<?php echo site_url('navegar/RegistrodeInformacion') ?>");


					}
				});
					
				}
			}

		</script>

		<?php
		$totalventa=0;
		if (isset($pedidos)) {
			foreach($pedidos->result() as $row)
			{
				?>

				<div class="row cart-item" id="div<?= $row->idPedidos;?>">
					<div class="col-xs-2 col-sm-3">
						

						<span><?= $row->Nombre;?></span>


					</div>
					<div class="col-xs-3 product-position product-price">
						<span class="amount">$ <?=$row->precio;?></span>
					</div>
					<div class="col-xs-2 product-position product-quantity">
						<div class="quantity" id="input<?= $row->idPedidos;?>">
							<input type="tel" onkeypress="ValidaSoloNumeros()" lang="<?= $row->idPedidos;?>" step="1" title="<?=$row->precio;?>" name="" value="<?= $row->cantidad;?>"  class="input-text qty text" size="4">

						</div>
					</div>
					<div class="col-xs-3 product-position product-subtotal">
						<?php
						$tprecio=($row->cantidad)*($row->precio);
						$totalventa+=$tprecio;
						$idp=$row->idPedidos;
						?>
						<span class="amount" id="<?= $row->idPedidos;?>">$ <?=$tprecio;?>

						</span>
						<input type="hidden" id="in<?= $row->idPedidos;?>" value="<?=$tprecio;?>" class="tcuenta">
					</div>
					<div class="col-xs-1 product-position product-remove">
						<a href="<?php echo site_url('venta/eliminarPedido/'.$idp) ?>" class="remove removex" data-djax-exclude="true" name="<?= $row->idPedidos;?>" title="Eliminar Producto"><i class="icon-close"></i></a>
					</div>
				</div>



				<?php
			}
		}

		?>




		<div class="row cart-subtotal">
			<div class="col-xs-8" style="text-align:right">
				<span>Empaque</span><br>
				<span>Productos:</span><br>
				<span>IVA 16%:</span><br>
				<span>Subtotal:</span><br>
				<span>TOTAL:</span>
			</div>
			<div class="col-xs-4">
				<span class="amount" id="empaquespan">$ </span><br>
				<span class="amount" id="summostrartotal" title="<?=$totalventa?>">$ <?=$totalventa?></span><br>
				<span class="amount" id="ivaspan" >$ </span><br>
				<span class="amount" id="subtotalsan" >$ </span><br>
				<span class="amount" id="total" >$ </span>
			</div>

			<div class="col-xs-12 slidesub" style="text-align:center" >

				<span style="color:#FFFFE0">¿Te gustaría agregarle alguna salsa, queso o productos a tu pedido?
				</span><BR>
				<a title="" href="<?php echo site_url('venta/Extras') ?>" class="btn" style="background-color:yellow">
					<i class="fa fa-gift"></i> AGREGAR
				</a>

			</div>
		</div>

		<div class="row cart-buttons">
			<div class="col-xs-12">
				<a href="<?php echo site_url('venta/VentOnline') ?>" class="btn btn-dark  continue-shopping">SEGUIR <br>COMPRANDO</a>
				<div class="product-btn">

					<a href="<?php echo site_url('venta/Shopping') ?>"    class="btn btn-default  ">EDITAR PEDIDO</a>
					
				</div>
			</div>
		</div>
		<div class="row cart-buttons">
			<div class="col-xs-12">
				<div class="coupon-code">
					<input type="text" placeholder="Coupon code" class="form-control">
					<a href="#" class="btn btn-default ">Aplicar Cupon</a>
				</div>
				<div class="product-btn">
					<a href="#"   onClick="procesarVenta()" class="btn btn-color procesarCuenta">PAGAR</a>
				</div>
			</div>
		</div>
	</div>
</div>
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
<script type="text/javascript" src="../style/js/funciones.js"></script>

<!-- Notificaciones -->
<script type="text/javascript" src="../style/lib/alertify.js"></script>
<link rel="stylesheet" href="../style/themes/alertify.core.css" />
<link rel="stylesheet" href="../style/themes/alertify.default.css" />

</body>
</html>
