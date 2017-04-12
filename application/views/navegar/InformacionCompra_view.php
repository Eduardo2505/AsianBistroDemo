
<?php

//session_start();
$cols="";
$dels="";
$cps="";
$idss="";
if (isset($_SESSION['colonia_session'])) {
 $cols=$_SESSION['colonia_session'];
 $dels=$_SESSION['delegacion_session'];
 $cps=$_SESSION['cp_session'];
 $idss=$_SESSION['idSucursal_session'];
}

?>

<head>
<meta charset="UTF-8">
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
				<link rel="stylesheet" href="../css/custom.css">
				<script src="../js/jquery-2.1.0.min.js"></script>
				<script src="../js/modernizr-2.6.2.min.js"></script>
				<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?sensor=false&amp;ver=3.0'></script>




				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

				<script type="text/javascript">


				</script>




				<script type=”text/javascript”>
					var dispositivo = navigator.userAgent.toLowerCase();
					if( dispositivo.search(/iphone|ipod|android/) > -1 ){
						document.location = m<?php echo site_url('navegar/Contacto') ?>;
						document.location = "m<?php echo site_url('navegar/Contacto') ?>";
					}
				</script>

				<script type="text/javascript">

					$(document).ready(function() {
						$('#formulacliendiv').hide();
						$('#btnsumbit').hide();

						$("#cp").blur(function(event) {
							var cp =parseInt($(this).val());
								//alert(cp);
								$("#resultColonia").load('../venta/bucarCP/'+cp);


							});
					});


                $(function() {
                $('#guardar').submit(function() {
                    var data = $(this).serialize();
                    var tipopag = $("#tipoPagofrom").val().toString();                    
                    $.post('../venta/PedidoRegistro', data, function(respuesta) {
                       if(tipopag=='PayPal'){
						$('#respuesta').html(respuesta);
                       }else{
                       	$("#recargarrefres").load('http://essy.com.mx/ServicioAsianvistro/Imprimir.jsp?idpedido='+respuesta);
                       	$('#respuesta').html('<div class="col-xs-12 col-md-9"><h3>SU PEDIDO SE REALIZO EXITOSAMENTE</h3><br><h2>En seguida recibirá un correo de confirmación, nuestros operadores esta revisando su pedido, sino recibe el correo porfavor revise su <span style="color:red">bandeja de spam.<span></h2><h5 style="color:red">SU FOLIO ES:'+respuesta+'</h5><div class="product-btn"><a href="<?php echo site_url(); ?>" class="btn btn-color  ">ACEPTAR</a></div></div>');
                       }
                        
                         

                    });
                    return false;
                });
            });

				</script>

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


			</head>
<div id="recargarrefres" style="display:none">
	
</div>
			<body class="intro-fullscreen fixed-footer scroll-down yo-anim-enabled" >

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
									<img src="../img/logo1.png" class="light-logo" alt="Asian Bistro"/>
									<img src="../img/logo2.png" class="dark-logo" alt="Asian Bistro"/>
								</figure>
							</a>
						</div>
						<div class="main-nav">
							<ul class="pull-right">
								<li>
									<a href="<?php echo site_url('venta/Shopping') ?>" class="">REGRESAR</a>

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
											<img src="../img/logo2.png" alt="Asian Bistro"/>
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
								<a title="" href="<?php echo site_url('venta/Shopping') ?>">REGRESAR</a>

							</li>

						</ul>
					</div>
				</div>




				<section id="blog" class="section-scroll main-section blog-content blog">
					<header class="section-header">
					
					</header>

				</section>
				<section id="contact" class="section-scroll main-section">
					<header class="section-header">
						<h2>REGISTRO DE COMPRA </h2>
					</header>
					<div class="contact-content container section-padding" id="respuesta">


						<div class="col-xs-12 col-md-9" id="formulacliendiv">
							<h3>Formulario de Contácto TIPO DEPAGO :<span id="vertipoPagofrom"></span></h3>

							
							<form id="guardar">
								<input type="hidden"  name="tipoPago" id="tipoPagofrom"  required>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" maxlength="45" required class="form-control contact-form "  placeholder="Nombre Completo" name="name" id="name">
									</div>
									<div class="form-group">
									<table>
										<tr>
										<td><input style="width:95%" class="contact-form form-control" maxlength="10" onkeypress="return permite(event, 'num')" required type="tel" placeholder="TELEFONO" name="telefono" id="telefono" ></td>
										<td><input style="width:100%"  class="contact-form form-control" maxlength="5" onkeypress="return permite(event, 'num')" required type="tel" placeholder="C.P." name="cp" id="cp" value="<?php echo $cps?>"></td></tr>
									</table>
										Procura poner tu teléfono correcto por si tenemos una duda.
									</div>
									<div class="form-group" id="resultColonia">


										<!--<input type="hidden"  name="colonia" id="colonia" required>
										<input type="hidden"  name="idSucursal" id="idSucursal" required>
										<input type="hidden"  name="delegacion" id="delegacion" required>
										<label class="contact-form form-control ">Colonia</label>
										<label class="contact-form form-control ">Delegación</label>-->

										<input type="hidden"  name="colonia" id="colonia" value="<?php echo $cols?>" required>
	                                    <input type="hidden"  name="delegacion" id="delegacion" value="<?php echo $dels?>" required>
	                                    <input type="hidden"  name="idSucursal" id="idSucursal" value="<?php echo $idss?>" required>
	                                    <label class="contact-form form-control "><?php echo $cols?></label>
	                                    <label class="contact-form form-control "><?php echo $dels?></label>


									</div>
									<div class="form-group">
										<input class="contact-form form-control "  maxlength="45" required type="text" placeholder="CALLE" name="calle" id="calle">
									</div>
									<div class="form-group">
									<table>
										<tr>
										<td>
										<input style="width:95%" class="contact-form form-control "  maxlength="45" required type="text" placeholder="Número Exterior  ó N/A" name="numexte" id="numexte">
										</td>
										<td>
										<input style="with:100%" class="form-control "  maxlength="45" type="text" placeholder="Num Int." name="numint" id="numint">
										</td></tr>
									</table>
									</div>
									
									<div class="form-group">
										<input class="contact-form form-control"   maxlength="45" type="text" placeholder="Entre que calles" name="calles" id="calles">
									</div>
									

								</div>
								<div class="col-md-6">
									<div class="form-group">
									<input   class="contact-form form-control" maxlength="5" onkeypress="return permite(event, 'num')" required type="tel" placeholder="Personas" name="personas" id="personas"></td>
												
									</div>
									<div class="form-group" id="tipotarjetacambio" >

									</div>
									<div class="form-group">
										<input class="contact-form form-control"  maxlength="45" required type="email" placeholder="Email" name="email" id="email">
									</div>
									<div class="form-group">
									<textarea class="contact-form form-control" maxlength="440" name="comentario" placeholder="¿Deseas eliminar algún ingrediente de tus platillos?"></textarea>
									
									</div>
									
									<div class="form-group">
										<input type="checkbox" name="terminos" value="1" checked="" required> Acepto terminos <br>
                                        <input type="checkbox" name="notificaciones" value="1" checked=""> Notificaciones <br>
                                        <input type="checkbox" name="edadnoti" value="1" checked="" required> Soy mayor a 16 años 
									</div>

								</div>

								<div class="col-md-6">
									<div class="form-group text-right button-submit btn-submit">
										<a href="#" title="Regresar" id="btnregresar" class="btn btn-dark button-send" >REGRESAR</a>

<a href="#" title="ENVIAR"  class="btn btn-dark button-send" id="btnEnviar">CONFIRMAR</a>
<div id="btnsumbit">
<input type="submit" id="btnEnviarAhora">
</div>

										<div class="message-success alert-success alert hidden"><i class="fa fa-check"></i></div>
									</div>
								</div>
							</form>
						</div>

						<div class="col-xs-12 col-md-12" id="divpagos">
							<script type="text/javascript">
								$(document).ready(function() {
									$("#btnEnviar").click(function(event) {

										var name = $("#name").val().toString();
										var telefono =$("#telefono").val().toString();
										var cp = $("#cp").val().toString();
										var colonia = $("#colonia").val().toString();
										var delegacion = $("#delegacion").val().toString();
										var calle = $("#calle").val().toString();
										//var numint= $("#numint").val().toString();
										var numexte = $("#numexte").val().toString();
										var email = $("#email").val().toString();
										var personas = $("#personas").val().toString();
										var cambiTarjeta = $("#cambiTarjeta").val().toString();
										var calles = $("#calles").val().toString();
										


										if(name==""){
											alertify.error('Capture Nombre');
											$("#name").focus();
										}else if(telefono==""){

											alertify.error('Capture su Télefono');
											$("#telefono").focus();

										}else if(cp==""){

											alertify.error('Capture su CP');
											$("#cp").focus();

										}else if(personas==""){

											alertify.error('Capture su Num personas');
											$("#personas").focus();
										}
										else if(cambiTarjeta==""){

											alertify.error('Capture su tipo de Tarjeta o Efecto');
											$("#cambiTarjeta").focus();

										}else if(colonia==""){

											alertify.error('Capture su Colonia');
											$("#colonia").focus();

										}else if(delegacion==""){

											alertify.error('Capture su Delegación');
											$("#delegacion").focus();

										}else if(calle==""){

											alertify.error('Capture su Calle');
											$("#calle").focus();

										}else if(numexte==""){

											alertify.error('Capture su Numero Exterior');
											$("#numexte").focus();
										}else if(email==""){

											alertify.error('Capture su Email');
											$("#email").focus();
										}/*else if(calles==""){

											alertify.error('Capture las calles de referencia');
											$("#calles").focus();
										}*/

										else{

											var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
											  if( !emailReg.test(email)) {
											    alertify.error('FORMATO DE EMAIL INCORRECTO');
											    $("#email").focus();
											  } else {

											    $("#btnEnviarAhora").click();
											  }


										}




									});
								});

								$(document).ready(function() {
									$(".tipoPago").click(function(event) {
										var tipoPago = $(this).attr("title").toString();

										$("#tipoPagofrom").val(tipoPago);
										
										if(tipoPago=="Tarjeta"){
											$("#tipotarjetacambio").html('<select   class="contact-form form-control" name="cambiTarjeta" id="cambiTarjeta" required><option value="">Tarjeta</option><option value="Master Card y Visa">Master Card y Visa</option><option value="American Express">American Express</option></select>');
										}
										else if(tipoPago=="Efectivo"){

											$("#tipotarjetacambio").html('<input  class="contact-form form-control" maxlength="4" onkeypress="return permite(event, \'num\')" required type="text" placeholder="¿Con cuánto va pagar?" name="cambiTarjeta" id="cambiTarjeta" >');
										}else{
											
											$("#tipotarjetacambio").html('<input type="hidden" name="cambiTarjeta" id="cambiTarjeta" value="0">');
										}
										$("#vertipoPagofrom").html(" "+tipoPago);
										$('#divpagos').hide();
										$('#formulacliendiv').show();

									});
								});
								$(document).ready(function() {
									$("#btnregresar").click(function(event) {

										$('#divpagos').show();
										$('#formulacliendiv').hide();

									});
								});
							</script>
							<style type="text/css">
							.ayudaImg {
height: auto;
max-width: 100%;
}
							</style>

							<div class="col-md-6">
								<a href="#" title="Tarjeta" class="tipoPago"><img class="ayudaImg" src="../style/tiposPagos/mail.png"></a>
							</div>

							<div class="col-md-6" >


								<a href="#" title="Efectivo" class="tipoPago"><img class="ayudaImg" src="../style/tiposPagos/Pago-Efectivo.png"></a>
							</div>
							<div class="col-md-6">

								<a href="#" title="PayPal" class="tipoPagoz"><img class="ayudaImg" src="../style/tiposPagos/paypal-logo.png"></a>
							</div>
							<div class="col-md-6">

								<a href="<?php echo site_url('venta/Shopping') ?>" title="PayPal" class="btn btn-dark button-send" >REGRESAR</a>
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

				<!-- Notificaciones -->
				<script type="text/javascript" src="../style/js/funciones.js"></script>
				<script type="text/javascript" src="../style/lib/alertify.js"></script>
				<link rel="stylesheet" href="../style/themes/alertify.core.css" />
				<link rel="stylesheet" href="../style/themes/alertify.default.css" />
			</body>




