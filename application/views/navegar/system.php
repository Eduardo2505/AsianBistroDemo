
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="Refresh" content="30;url=http://servicioenlinea.com.mx/AsianBistro/navegar/system/Altavista">-->
	<title>Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro</title>
	<META NAME="Description" CONTENT="Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro">
		<META NAME="keywords" CONTENT="Description" CONTENT="Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro">
			<META NAME=GENERATOR CONTENT="Description" CONTENT="Comida China, Asiática, Vietnamita y Oriental en el DF, Asian Bistro">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



				<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
				<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
				<!--		 Place favicon.ico and apple-touch-icon.png in the root directory -->
				<link rel="stylesheet" href="../../css/custom.css">
				<script src="../../js/jquery-2.1.0.min.js"></script>
				<script src="../../js/modernizr-2.6.2.min.js"></script>
				<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?sensor=false&amp;ver=3.0'></script>




				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

				<script type="text/javascript">


				</script>


				<style type="text/css">

					.cart-header{
						color:#FFFFFF;
					}

					@media screen and (max-width:1480px){
						body{
							background-color:#F8F8F8;

						}
						.cart-header{
							color:#FFFFFF;
						}
					}
				</style>

				<script type="text/javascript">   
					setInterval(function(){
						var sucursal = $("#contact").attr('title');
						var dataString = 'idSucursal=' + sucursal;
						$.ajax({
							type: "POST",
							url: "../../navegar/systemrefresh",
							data: dataString,
							success: function(data) {
								//alert(data);

								$('#verActualizar').html(data);



							}
						});
					}, 10000); 
				</script>
			</head>

			<body class="intro-fullscreen fixed-footer scroll-down yo-anim-enabled">

				<!--content-->

				<nav id="main-navbar" class="hidden-xs hidden-sm">
					<div class="nav hidden-xs">
						<div class="main-reorder pull-right">
							<a href="#">
								<i class="fa fa-bars"></i>
							</a>
						</div>

						<div class="logo pull-left">
							<a href="http://asianbistro.mx/">
								<figure>
									<img src="../../img/logo1.png" class="light-logo" alt="Asian Bistro"/>
									<img src="../../img/logo2.png" class="dark-logo" alt="Asian Bistro"/>
								</figure>
							</a>
						</div>

					</div>
				</nav>


				

				
				<section id="contact" class="section-scroll main-section" title="<?php echo $suscu; ?>">
					<header class="section-header">
						<h2>VENTAS </h2>
					</header>
					<div class="contact-content container section-padding" style="text-align:center">


						<div class="col-xs-12 col-md-12" style="text-align:center" id="verActualizar">

							<script type="text/javascript">
								$(document).ready(function() {
									$('.btn-color').click(function() {
										var tiempo = $(this).attr('title');
										var idPedido = $(this).attr('name');
										var sucursal = $("#contact").attr('title');
										var dataString = 'idPedido='+idPedido+'&time='+tiempo+'&sucursal='+sucursal;                        
										$.ajax({
											type: "POST",
											url: "../../navegar/updateTiempo",
											data: dataString,
											success: function(data) {
                                	//alert(data);
                                	$("#emailver").load('../../venta/enviarEmailconfirmacion/'+idPedido);
                                	$('#verActualizar').html(data);

                                }
                            });
									});
								});

							</script>
							<div id="emailver" style="display:none"></div>
							<table width="100%">
								<tr><th style="text-align:center"><h2>IDPEDIDO</h2></th><th style="text-align:center"><h2>TIEMPOS</h2></th></tr>

								<?php
								if (isset($pedidos)) {
									foreach($pedidos->result() as $row)
									{
										?>



										<div class="product-btn">

											<tr><td><h3><?= $row->idPedido;?></h3></td>
												<td>
													<a href="#" title="15" name="<?php echo $row->idPedido; ?>" class="btn btn-color">15</a>
													<a href="#" title="30" name="<?php echo $row->idPedido; ?>" class="btn btn-color">30</a>
													<a href="#" title="45" name="<?php echo $row->idPedido; ?>" class="btn btn-color">45</a>										
													<a href="#" title="60" name="<?php echo $row->idPedido; ?>" class="btn btn-color">60</a>
													<a href="#" title="75" name="<?php echo $row->idPedido; ?>" class="btn btn-color">75</a>
													<a href="#" title="90" name="<?php echo $row->idPedido; ?>" class="btn btn-color">90</a>
													<a href="#" title="CANCELACION" name="<?php echo $row->idPedido; ?>" class="btn btn-color">CANCELACION</a>
												</td>
											</tr>





										</div>





										<?php
									}
								}

								?>


							</table>

						</div>



					</div>
				</section>

				<div id="footer-spacer"></div>
				<footer id="footer" class="text-center">

					<a href="#" class="to-the-top">
						<i class="fa fa-arrow-circle-o-up"></i>
					</a>

					<h2>Asian Bistro</h2>

					
					


					<p class="copyrights">© 2006 Asian Bistro. Derechos Reservados. <a href="<?php echo site_url('navegar/PoliticasDePrivacidad') ?>"> Políticas de Privacidad</a></p>
				</footer>
				<div class="gallery-wrapper"></div>

				<script src="../../js/browser.js"></script>
				<script src="../../js/jquery.ba-throttle-debounce.min.js"></script>
				<script src="../../js/jquery.smooth-scroll.js"></script>
				<script src="../../js/matchmedia.js"></script>
				<script src="../../js/enquire.min.js"></script>
				<script src="../../js/jquery.velocity.min.js"></script>
				<script src="../../js/waypoints.js"></script>
				<script src="../../js/owl.carousel.js"></script>
				<script src="../../js/jquery.mb.YTPlayer.js"></script>
				<script src="../../js/jquery.parallaxify.js"></script>
				<script src="../../js/jquery.imagesloaded.js"></script>
				<script src="../../js/jquery.unveil.min.js"></script>
				<script src="../../js/jquery.superslides.min.js"></script>
				<script src="../../js/jquery.fullPage.min.js"></script>
				<script src="../../js/jquery.mixitup.js"></script>
				<script src="../../js/main.js"></script>


			</body>
			</html>


