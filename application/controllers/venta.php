<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Venta extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function VentOnline() {


        $this->load->model('categoria_models');
        $this->load->model('pedido_models');
        $vatime = $this->pedido_models->horaServicio();

        if ($vatime > "13:00:00" AND $vatime < "21:30:00") {

            $data['categorias'] = $this->categoria_models->mostrar();
            $data['pedidos'] = $this->pedido_models->mostrar();
            $this->load->view('venta/tiendas', $data);
        } else {
            $this->load->view('venta/fuera_de_servicio');
        }
    }

    public function VentOnlinedir() {


        $this->load->model('sucursal_models');
        $this->load->model('pedido_models');
        $vatime = $this->pedido_models->horaServicio();

        if ($vatime > "13:00:00" AND $vatime < "21:30:00") {

            $data['sucursales'] = $this->sucursal_models->mostrar();

            $this->load->view('venta/cpinicial', $data);
        } else {
            $this->load->view('venta/fuera_de_servicio');
        }
    }

    public function VentOnlineCp() {


        $this->load->model('categoria_models');
        $this->load->model('pedido_models');
        $vatime = $this->pedido_models->horaServicio();

        if ($vatime > "13:00:00" AND $vatime < "21:30:00") {

            $data['categorias'] = $this->categoria_models->mostrar();
            $data['pedidos'] = $this->pedido_models->mostrar();
            $this->load->view('venta/tiendas', $data);
        } else {
            $this->load->view('venta/fuera_de_servicio');
        }
    }

    public function Subcategiras($valor = FALSE) {
        $this->load->model('subcategoria_models');
        $data['idCategoria'] = $valor;
        $data['subcategorias'] = $this->subcategoria_models->mostrar($valor);
        $this->load->view('venta/subCategoriasMenu', $data);
    }

    public function Productos($valor = FALSE, $valor1 = FALSE) {
        $this->load->model('producto_models');
        $this->load->model('categoria_models');
        $this->load->model('subcategoria_models');
        $data['idCategoriax'] = $valor;
        $data['idSubCategoriax'] = $valor1;
        $info = $this->categoria_models->nomcategoria($data['idCategoriax']);
        $infosub = $this->subcategoria_models->subcategiria($data['idSubCategoriax']);
        $data['idCategoria'] = $info->Categoria;
        $data['idSubCategoria'] = $infosub->Nombre;
        $data['productos'] = $this->producto_models->mostrar($data['idCategoriax'], $data['idSubCategoriax']);
        $this->load->view('venta/viewProdutos', $data);
    }

    //#####################correcto####################3
    public function addPedido($valor = FALSE, $valor1 = FALSE, $valor2 = FALSE) {
        $this->load->model('pedido_models');
        $this->load->model('pedidosproductos_models');
        $data['idProducto'] = $valor;
        $data['precio'] = $valor1;
        $data['cantidad'] = $valor2;
        $ip = $_SERVER['REMOTE_ADDR'];
        $registro = $this->pedido_models->CURRENT_TIMESTAMP();
        $info = $this->pedido_models->mostrarporfolio($ip, 'Pendiente');
        $numres = $info->num_rows();
        if ($numres == 0) {

            $this->pedido_models->insertar($ip, $registro);
        }
        $this->pedidosproductos_models->insertar($data['idProducto'], $data['precio'], $data['cantidad'], $ip, $registro);
        $data['pedidos'] = $this->pedido_models->mostrar();
        $this->load->view('venta/pedidos_view', $data);
    }

    //##############correcto##########
    public function Shopping() {
        $this->load->model('pedido_models');
        $vatime = $this->pedido_models->horaServicio();
        if ($vatime > "13:00:00" AND $vatime < "21:30:00") {
            $ip = $_SERVER['REMOTE_ADDR'];
            $this->load->model('pedidosproductos_models');
            $info = $this->pedidosproductos_models->buscar($ip);
            $numres = $info->num_rows();


            if ($numres == 0) {
                $this->load->view('venta/carritoproductovacio_view');
            } else {

                $data['pedidos'] = $this->pedido_models->mostrar();
                $this->load->view('venta/carrito', $data);
            }
        } else {
            $this->load->view('venta/fuera_de_servicio');
        }
		 //$this->load->view('venta/fuera_de_servicio');
    }

// correcto
    public function updateCatidad($valor = FALSE, $valor1 = FALSE, $valor2 = FALSE) {

        $this->load->model('pedidosproductos_models');
        $data['idPedido'] = $valor;
        $data['cantidad'] = $valor1;
        $data['precio'] = $valor2;
        $data['pedidos'] = $this->pedidosproductos_models->updateCantidad($data['idPedido'], $data['cantidad']);
        $this->load->view('venta/cantidad_update_view', $data);
    }

    // compuesto.....
    public function eliminarPedido($valor = FALSE) {

        $this->load->model('pedidosproductos_models');
        $data['idPedido'] = $valor;
        $this->pedidosproductos_models->eliminar($data['idPedido']);
        redirect('/venta/Shopping', 'refresh');
    }

    //correcto
    public function bucarCP($valor = FALSE) {

        $this->load->model('colonias_models');
        $data['cp'] = $valor;
        $data['delegacion'] = $this->colonias_models->buscarCP($data['cp']);
        $this->load->view('venta/cp_view', $data);
    }

    //correcto
    public function buscarCParray($valor = FALSE) {

        $this->load->model('colonias_models');
        $data['cp'] = $valor;
        $data['delegacion'] = $this->colonias_models->buscarCParray($data['cp']);
        $this->load->view('venta/cp_view', $data);
    }

//correcto
    public function PedidoRegistro() {
        $this->load->model('cliente_models');
        $this->load->model('pedido_models');

        $cpr = $this->input->post('cp');
        $telr = $this->input->post('telefono');
        $emailr = $this->input->post('email');
        $nombrecap = $this->input->post('name');



        $pedicount = $this->pedido_models->verficarCliente($cpr, $telr, $emailr);
        $row = $pedicount->row();
        $total = $row->total;
        $callesentre = $this->input->post('calles');
        $data = array(
            'tipoPago' => $this->input->post('tipoPago'),
            'name' => $nombrecap,
            'telefono' => $telr,
            'cp' => $cpr,
            'colonia' => $this->input->post('colonia'),
            'delegacion' => $this->input->post('delegacion'),
            'calle' => strtolower($this->input->post('calle')),
            'numint' => $this->input->post('numint'),
            'numexte' => $this->input->post('numexte'),
            'idSucursal' => $this->input->post('idSucursal'),
            'email' => $emailr,
            'personas' => $this->input->post('personas'),
            'cambiTarjeta' => $this->input->post('cambiTarjeta'),
            'comentario' => strtolower($this->input->post('comentario')),
            'callesentre' => strtolower($callesentre),
            'terminos' => $this->input->post('terminos'),
            'notificaciones' => $this->input->post('notificaciones'),
            'notedad' => $this->input->post('edadnoti'),
            'tipoCliente' => $total);
        $returnpago = $this->cliente_models->insertar($data);
        //$datas['folio']=$returnpago[1];
        if ($returnpago[0] == "Efectivo") {
            echo $returnpago[1];

            //$this->load->view('venta/confimacion_view',$datas);
        } else if ($returnpago[0] == "PayPal") {

            $datapedidos['frecupreado'] = $returnpago[1];
            $datapedidos['pedidosresul'] = $this->pedido_models->mostrarpaypal($returnpago[1]);

            /* ################################# */
            $this->load->view('navegar/paypal_view', $datapedidos);
        } else if ($returnpago[0] == "Tarjeta") {
            echo $returnpago[1];
        } else if ($returnpago[0] == "RecogerSucursal") {
            echo $returnpago[1];
        }
    }

    public function pruebacorreo() {
        $html = 'Nombre : Este es una pruba demo';
        
        $this->load->library('email');
        $this->email->from('servicioenlinea@asianbistro.mx', 'Pedidos en linea');
        $this->email->reply_to('ventas@kozma.com.mx'); /// si el usuario le da reenviar este se va contactar
        // $this->email->to($senderEmail); // este se ouede enviar a diferentes distinatarios con la coma
        //$this->email->cc('wendy.gonzalez@kozma.com.mx,liliana.gonzalez@kozma.com.mx');// Aqui el usario se ve la copia
        $this->email->bcc('eduardopadilla@helpmex.com.mx'); // Aqui el usario se ve la copia no se muestra
        $this->email->subject("Demo correo");
        $this->email->message($html);
        $this->email->send();
        
    }

    public function enviarEmailconfirmacion() {

        $this->load->model('cliente_models');
        $this->load->model('pedido_models');
        /* ##################### Actualizar los datos ##################### */

        $idpedido = $this->input->get('o');
        $ak = $this->input->get('ak');
        $tieminfo = "";
        if ($ak == 'Accepted') {
            $tieminfo = $this->input->get('m');
            if ($tieminfo == '30_Minutes') {
                $tieminfo = '30 min';
            }
            if ($tieminfo == '45_Minutes') {
                $tieminfo = '45 min';
            }
            if ($tieminfo == '1_hours') {
                $tieminfo = '1 Hora';
            }
            if ($tieminfo == '1_hour_15minuts') {
                $tieminfo = '1 Hora 15 min';
            }
            if ($tieminfo == '1_hour_30_minutes') {
                $tieminfo = '1 Hora 30 min';
            }
        } else {
            $tieminfo = "Cancelado";
        }
        $dataupdate = array('timpo' => $tieminfo,
            'impreso' => 2);
        $this->pedido_models->updateConfirmacion($idpedido, $dataupdate);

        /* ################################################################## */
        $folioenviar = $idpedido;
        $info = $this->pedido_models->mostrarDatosPedido($folioenviar);
        $pedidosresulvf = $this->pedido_models->mostrarPedidosAutorizados($folioenviar);

        $row = $info->row();
        date_default_timezone_set('America/Mexico_City');
        $email = "" . $row->emailcli . "";

        $html = "";

        //#########################Email aceptado#############
        if ($ak == 'Accepted') {
            $asunto = "Confirmación de tu Orden " . $folioenviar . "";

            $html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
				<title>Confimación de tu pedido</title>
				<script>
					<!--
				--></script>           
				<style type="text/css">

					/* Email Client BUG Fixes */
					.ReadMsgBody, .ExternalClass {width:100%; background-color: #f8f8f8;}
					.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
					body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
					body {margin:0; padding:0;}
					table {border-spacing:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
					table td {border-collapse:collapse;}
					img { border: 0; }
					html {width: 100%; height: 100%;}
					/* End Email Client BUG Fixes */

					/* Embedded CSS link color */
					a         {color:#000000; text-decoration:none;}
					a:link    {color:#000000; text-decoration:none;}
					a:visited {color:#000000; text-decoration:none;}
					a:focus   {color:#000000 !important;}
					a:hover   {color:#000000 !important;}

					/* End of Embedded CSS link color */

					/* Clickable phone numbers */
					a[href^="tel"], a[href^="sms"] {text-decoration:none; color:#353535; pointer-events:none; cursor:default;}
					.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:default; color:#000000 !important; pointer-events:auto; cursor:default;}
					/* End of Clickable phone numbers */

					/* Media Queries */

					@media only screen and (max-width: 639px) {
						body{width:auto!important;}

						/* Adjust table widths at smaller screen sizes */
						body[yahoo] .table		{width:320px !important;}
						body[yahoo] .inside		{width:250px !important;}
						body[yahoo] .remove		{width:0px !important;}

						/* Center Elements in Tables */
						body[yahoo] .content-center 		{text-align:center !important;}

						/* Center Buttons in Tables */
						body[yahoo] .button-center 		{display: block !important; margin-left: auto !important; margin-right: auto !important; text-align:center !important;}

						/* Header columns */
						body[yahoo] .header-left		{width:320px !important;}
						body[yahoo] .header-left img	{display: block !important; margin-left: auto !important; margin-right: auto !important;}
						body[yahoo] .socials-right  	{display:none !important;}

						/* Footer columns */
						body[yahoo] .footer 		{width:320px !important; text-align:center !important;}
						body[yahoo] .footer img		{display:none !important;}			

						/* Image 600 Resized */
						body[yahoo] .image600 img 	{width:300px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}

						/* Image 300 Resized */
						body[yahoo] .image300 img 	{width:280px !important; height:107px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}

						/* Image 560 Resized */
						body[yahoo] .image560 img 	{width:280px !important; height:100px !important;}
						body[yahoo] .shadow560 img 	{width:280px !important; height:9px !important;}

						/* Image 270 and Text  Resized */
						body[yahoo] .image270 img 	{width:280px !important; height:208px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}
						body[yahoo] .image270-2 img 	{width:280px !important; height:208px !important;}
						body[yahoo] .text270 		{width:310px !important;}
						body[yahoo] .text270-2 		{width:300px !important;}
						body[yahoo] .distance-1		{height:0px !important;}
						body[yahoo] .distance-2		{height:20px !important;}
						body[yahoo] .hideable    	{display:none !important;}

						/* Hideable Icon Image */
						body[yahoo] .hideable-icon  {display:none !important;}
						body[yahoo] .text-icon 		{width:320px !important;}

						/* End of Media Queries */

					</style>
				</head>

				<body style="width:100% !important; color:#353535; background:#f8f8f8; font-family: Helvetica,sans-serif; font-size:13px; line-height:140%; margin:0; padding:0;" yahoo="fix">


					<!-- * Header Module * -->
					<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
						<tr>
							<td bgcolor="#f8f8f8">						
								<!-- Tables Width -->
								<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">					

									<!-- Top Header -->
									<tr>
										<td>
											<table width="100%" cellpadding="10" cellspacing="0" border="0">
												<tr>
													<td height="24" valign="middle" style="font-size:11px; color:#353535; text-align:right" class="content-center">
														<!--Problem viewing this email? <a href="#" target="_blank" style="color:#353535; text-decoration:none; font-style:italic;">View it in your browser.</a>-->
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<!-- End of Top Header -->						

								</table>
								<!-- End of Tables Width -->				
							</td>
						</tr>	
						<tr><td height="1" bgcolor="#f1f1f1"></td></tr>
						<tr><td height="4" bgcolor="#ff580e"></td></tr>	
						<tr><td height="1" bgcolor="#dd4c0c"></td></tr>	
						<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
						<tr>
							<td bgcolor="#ffffff">
								<!-- Tables Width -->
								<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">	
									<tr>
										<td>

											<!-- A1 -->
											<table align="left" bgcolor="#ffffff" width="300" cellpadding="0" cellspacing="0" border="0" class="header-left">										
												<tr>
													<td width="20"></td>

													<!-- Logo Image -->
													<td width="247" align="left" valign="top">													
													<a href="www.asianbistro.mx" target="_blank"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/logo-header.jpg" width="160" height="100" border="0" alt="Logo Header" style="display:block; border:none; outline:none; text-decoration:none;"/></a>
													</td>
													<!-- End of Logo Image -->

													<td width="20"></td>
												</tr>	
											</table>
											<!-- End of A1 -->	

											<!-- Social Links -->	
											<table align="right" width="295" cellpadding="0" cellspacing="0" border="0" class="socials-right">
												<tr>
													<td width="15" bgcolor="#ffffff"></td>
													<td width="260" height="50" bgcolor="#ffffff">													
														<table border="0" cellpadding="0" cellspacing="0" align="right">
															<tr>
																<td>
																	<a href="www.twitter.com/AsianBistroMx" target="_blank" style="text-decoration: none;">
																		<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-twitter.jpg" width="40" height="100" border="0" alt="Twitter" title="Twitter" style="display:block; border:none; outline:none; text-decoration:none;" />
																	</a>
																</td>
																<td>
																	<a href="www.facebook.com/AsianBistroMx" target="_blank" style="text-decoration: none;">
																		<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-facebook.jpg" width="40" height="100" border="0" alt="Facebook" title="Facebook" style="display:block; border:none; outline:none; text-decoration:none;" />
																	</a>
																</td>
																<td>
																	<!--
																	<a href="#" target="_blank" style="text-decoration: none;">
																		<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-dribbble.jpg" width="40" height="100" border="0" alt="Dribbble" title="Dribbble" style="display:block; border:none; outline:none; text-decoration:none;" />
																	</a>
																</td>
																<td>
																	<a href="#" target="_blank" style="text-decoration: none;">
																		<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-skype.jpg" width="40" height="100" border="0" alt="Skype" title="Skype" style="display:block; border:none; outline:none; text-decoration:none;" />
																	</a>
																</td>
																<td>
																	<a href="#" target="_blank" style="text-decoration: none;">
																		<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-google.jpg" width="40" height="100" border="0" alt="Google" title="Google" style="display:block; border:none; outline:none; text-decoration:none;" />
																	</a>
																</td>
																<td>
																	<a href="#" target="_blank" style="text-decoration: none;">
																		<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-vimeo.jpg" width="40" height="100" border="0" alt="Vimeo" title="Vimeo" style="display:block; border:none; outline:none; text-decoration:none;" />
																	</a>
																-->
															</td>
														</tr>													
													</table>
													
												</td>
												<td width="20" bgcolor="#ffffff"></td>
											</tr>
										</table>
										<!-- End of Social Links -->

									</td>
								</tr>
							</table>
							<!-- End of Tables Width -->				
						</td>
					</tr>
					<tr><td height="1" bgcolor="#dddddd"></td></tr>	
					<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
					<tr><td height="30" bgcolor="#f8f8f8"></td></tr>		
				</table>
				<!-- * End of Header Module * -->


				<!-- * Image 560x200 Module + Text Module * -->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">		
					<tr>
						<td bgcolor="#f8f8f8">						
							<!-- Tables Width -->
							<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
								<tr>	

									<!-- Image 560x200 -->
									<td align="center" valign="top" class="image560">													
										<a href="" target="_blank"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/image-560x200.jpg" width="560" height="200" border="0" alt="Image 560x200" style="display:block; border:none; outline:none; text-decoration:none;"/></a>
									</td>
									<!-- End of 560x200 -->	

								</tr>	
								<tr><td align="center" valign="top" class="shadow560"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/shadow.jpg" width="560" height="18" border="0" alt="" style="display:block; border:none; outline:none; text-decoration:none;"/></td></tr>	
								<tr><td height="10" bgcolor="#f8f8f8"></td></tr>			
							</table>
							<!-- End of Tables Width -->
						</td>
					</tr>
				</table>

				<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
					<tr>
						<td bgcolor="#f8f8f8">						
							<!-- Tables Width -->
							<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
								<tr>
									<td width="20"></td>

									<!-- Title Here -->
									<td width="560" valign="top" align="left" class="inside" style="color: #353535; text-align: center; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
										<h1>Tiempo de entrega ' . $row->tiempo . ' </h1><br>
										<p style="font-size: 19px">¡Gracias por <span style="color: #ff580e;">Pedir En Linea</span> ,tu pedido va en camino!</p>
										<br>
									</td>	
									<!-- End of Title -->

									<td width="20"></td>
								</tr>
								<tr><td colspan="3" height="10" bgcolor="#f8f8f8"></td></tr>
								<tr>
									<td width="20"></td>

									<!-- Content Text Here -->
									<td width="560" valign="top" align="left" class="inside" style="font-size: 14px; color: #353535; text-align: center; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
										Nos esforzamos por llevar la experiencia de 10 años de nuestra cocina hasta tu puerta. 
										Gracias por confiar en Asian Bistro.								
									</td>	
									<!-- End of Content Text -->

									<td width="20"></td>
								</tr>	
								<tr><td colspan="3" height="20" bgcolor="#f8f8f8"></td></tr>
								<tr>
									<td width="20"></td>
									<td width="560" align="center" class="inside">

										<!-- Button Link -->										
										<!--<a href="#" target="_blank" style="text-decoration: none;">
										<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/button-purchase.jpg" width="142" height="39" border="0" alt="Read More" title="Read More" style="display:block;" class="button-center"/>
									</a>-->
									<!-- End of Button Link -->

								</td>
								<td width="20"></td>
							</tr>
						</table>
						<!-- End of Tables Width -->
					</td>
				</tr>
				<tr><td align="center" valign="top" class="image600"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/divider.jpg" width="600" height="60" border="0" alt="" style="display:block; border:none; outline:none; text-decoration:none;"/></td></tr>	
			</table>	
			<!-- * End of Image 560x200 Module + Text Module * -->	


			<!-- * Promo Module * -->
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
				<tr>
					<td bgcolor="#f8f8f8">						
						<!-- Tables Width -->
						<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
							<tr>
								<td width="20"></td>

								<!-- Title Here -->
								<!--
								<td width="560" valign="top" align="left" class="inside" style="font-size: 19px; color: #353535; text-align: center; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
									DotSpot template is <span style="color: #ff580e;"> clean </span> and <span style="color: #ff580e;"> minimalist </span>
								-->
							</td>	
							<!-- End of Title -->
							<!--	
							<td width="20"></td>
						</tr>
						<tr><td colspan="3" height="20"></td></tr>
						<tr>
						-->	

						<!-- Image 300x115 -->
						<!--
						<td colspan="3" align="center" valign="top" class="image300">													
							<a href="#" target="_blank"><img src="images/icon-promo.jpg" width="300" height="115" border="0" alt="Image 300x115" style="display:block; border:none; outline:none; text-decoration:none;"/></a>
						</td>
					-->
					<!-- End of 300x115 -->	

				</tr>				
			</table>
			<!-- End of Tables Width -->
		</td>
	</tr>
</table>
<!--
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr>
			<td bgcolor="#f8f8f8">	
			-->					
			<!-- Tables Width -->
			<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
				<tr><td colspan="3" height="20" bgcolor="#f8f8f8"></td></tr>
				<tr>
					<td width="20"></td>

					<!-- Content Text Here -->
					<td width="560" valign="top" align="left" class="inside" style="font-size: 12px; color: #353535; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">							
						La <strong>orden #' . $folioenviar . '</strong> fue enviada exitosamente y corresponde a <strong>' . $row->sucursal . '</strong>
						<p></p>

						Si tienes cualquier pregunta, no dudes en comunicarte directamente con tu tienda al teléfono: <a href="tel:' . $row->telsuc . '"><span style="color:blue"><strong>' . $row->telsuc . '</strong></span></a>
						<p></p>

						<span style="color:#ff580e"><strong>Información de tu orden</strong></span>
						<br />
						<strong>Orden: </strong>' . $folioenviar . ' 
						<br />
						<strong>Fecha/hora: </strong>' . date("d/m/y H:i:s") . '
						<br />
						<strong>Pago: </strong> ' . $row->tipopago . '
						<br />';
            if ($row->tipopago == 'Efectivo') {
                $html .= '<strong>EFECTIVO : </strong> $ ' . $row->billeteTarjeta . '';
            } else {
                $html .= '<strong>Tarjeta : </strong>  ' . $row->billeteTarjeta . '';
            }



            $html .= '<br />						
						<strong>Tiempo de entrega : </strong>' . $row->tiempo . ' MIN					
						<br />
						<strong>Personas : </strong>' . $row->personas . ' 					
						<br />
						<strong>##*Extras*##</strong><br>' . $row->obser . '	
						<br /><br>
						

						<span style="color:#ff580e"><strong>Información de tu tienda</strong></span>
						<br />
						<strong>Tienda: </strong>' . $row->sucursal . '
						<br />
						<strong>Dirección: </strong> ' . $row->dirsuc . ' No. ' . $row->numsuc . ' Col. ' . $row->colsuc . ' Delg ' . $row->delsuc . ' , ' . $row->munisuc . '
						<br />
						<strong>Teléfono: </strong> ' . $row->telsuc . '
						<p></p>';
            $html .= '<span style="color:#ff580e"><strong>Productos</strong></span>';
            $html .= "<table><tr><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th></tr>";
            $totalsum = 0;
            foreach ($pedidosresulvf->result() as $rowp) {
                $tprecio = ($rowp->cantidad) * ($rowp->precio);
                $totalsum+=$tprecio;
                $html .= "<tr><td>" . $rowp->Nombre . "</td><td>" . $rowp->cantidad . "</td><td>$ " . $rowp->precio . "</td><td>$ " . $tprecio . "</td></tr>";
            }
            $empaque = $totalsum * .05;
            $tt = $totalsum + $empaque;
            $iva = $tt * .16;
            $Sub = $tt / 1.16;
            $html .= "<tr><td></td><td></td><td>__________</td><td>_______________</td></tr>";
            $html .= "<tr><td></td><td></td><td>Empaque:<br>Productos: <br>IVA 16%<br>Subtotal: <br> TOTAL:</td><td>$ " . number_format($empaque, 2) . "<br>$ " . number_format($totalsum, 2) . "<br>$ " . number_format($iva, 2) . "<br>$ " . number_format($Sub, 2) . "<br>$ " . number_format($tt, 2) . "</td></tr>";

            $html .= "</table>";

            $html .= '<span style="color:#ff580e"><strong>Datos de entrega</strong></span>
						<br />
						<strong>Nombre: </strong> ' . $row->nombrecli . '
						<br />
						<strong>Dirección: </strong> ' . $row->callecli . ' ' . $row->noexcli . ' ' . $row->noincli . ', Col. ' . $row->colcli . ', Delg. ' . $row->delcli . ',Ciudad de Mexico, Distrito Federal, C.P. ' . $row->cpcli . '.
						<br />
						<strong>Teléfono: </strong> ' . $row->telcli . '
                   
					</td>	
					<!-- End of Content Text -->

					<td width="20"></td>
				</tr>	
				<tr><td colspan="3" height="20" bgcolor="#f8f8f8"></td></tr>
				<tr>
					<td width="20"></td>
					<td width="560" align="center" class="inside">
					</td>
					<td width="20"></td>
				</tr>
			</table>
			<!-- End of Tables Width -->
		</td>
	</tr>
</table>	
<!-- * Promo Module * -->	


<!-- * ShowMore Module * -->
<!-- * End of ShowMore Module * -->	


<!-- * Footer Module * -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	<tr><td height="4" bgcolor="#ff580e"></td></tr>	
	<tr><td height="1" bgcolor="#dd4c0c"></td></tr>	
	<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
	<tr>
	</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	<tr>
		<td bgcolor="#606060">						
			<!-- Tables Width -->
			<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#606060" class="table">	
				<tr><td height="20"></td></tr>
				<tr>
					
					<!-- Copyright -->
					<td bgcolor="#606060" align="center" style="font-size: 12px; color: #ffffff; font-weight: bold; text-align: center; font-family: Helvetica, Arial, sans-serif;">
						© 2014 Asian Bistro. Derechos Reservados. <a href="www.asianbistro.mx/PoliticasDePrivacidad-html" target="_blank" style="text-decoration: none; color: #ffffff;"><strong>Políticas de Privacidad</strong></a>
						<br />
						<a href="www.asianbistro.mx/PoliticasDePrivacidad-html" target="_blank" style="text-decoration: none; color: #ffffff;">
							www.AsianBistro.mx </a>
						</td>
						<!-- End of Copyright -->
						
					</tr>	
					<tr><td height="20"></td></tr>					
				</table>
				<!-- End of Tables Width -->				
			</td>
		</tr>
	</table>						
	<!-- * End of Footer Module * -->

	
</body>
</html>';
            // $cabeceras = "Content-type: text/html\r\n";


            $cabeceras = 'From: servicioenlinea@asianbistro.mx' . "\r\n" .
                    'Reply-To: servicioenlinea@asianbistro.mx' . "\r\n" .
                    'Content-Type: text/html' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            if (mail($email, $asunto, $html, $cabeceras)) {
                echo "se envio";
            } else {
                echo "ni madres";
            }
            //echo  $html;
        } else {

            $asunto = "Orden Cancelada No." . $folioenviar . "";

            $html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Confimación de tu pedido</title>
	<script>
<!--
--></script>           
	<style type="text/css">

	/* Email Client BUG Fixes */
		.ReadMsgBody, .ExternalClass {width:100%; background-color: #f8f8f8;}
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
		body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
		body {margin:0; padding:0;}
		table {border-spacing:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
		table td {border-collapse:collapse;}
	    img { border: 0; }
		html {width: 100%; height: 100%;}
    /* End Email Client BUG Fixes */
	
	/* Embedded CSS link color */
		a         {color:#000000; text-decoration:none;}
		a:link    {color:#000000; text-decoration:none;}
		a:visited {color:#000000; text-decoration:none;}
		a:focus   {color:#000000 !important;}
		a:hover   {color:#000000 !important;}

	/* End of Embedded CSS link color */
	
	/* Clickable phone numbers */
		a[href^="tel"], a[href^="sms"] {text-decoration:none; color:#353535; pointer-events:none; cursor:default;}
		.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:default; color:#000000 !important; pointer-events:auto; cursor:default;}
	/* End of Clickable phone numbers */
   
    /* Media Queries */
      
		@media only screen and (max-width: 639px) {
			body{width:auto!important;}
			
			/* Adjust table widths at smaller screen sizes */
			body[yahoo] .table		{width:320px !important;}
			body[yahoo] .inside		{width:250px !important;}
			body[yahoo] .remove		{width:0px !important;}
			
			/* Center Elements in Tables */
			body[yahoo] .content-center 		{text-align:center !important;}
			
			/* Center Buttons in Tables */
			body[yahoo] .button-center 		{display: block !important; margin-left: auto !important; margin-right: auto !important; text-align:center !important;}
			
			/* Header columns */
			body[yahoo] .header-left		{width:320px !important;}
			body[yahoo] .header-left img	{display: block !important; margin-left: auto !important; margin-right: auto !important;}
			body[yahoo] .socials-right  	{display:none !important;}
			
			/* Footer columns */
			body[yahoo] .footer 		{width:320px !important; text-align:center !important;}
			body[yahoo] .footer img		{display:none !important;}			
			
			/* Image 600 Resized */
			body[yahoo] .image600 img 	{width:300px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}

			/* Image 300 Resized */
			body[yahoo] .image300 img 	{width:280px !important; height:107px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}
			
			/* Image 560 Resized */
			body[yahoo] .image560 img 	{width:280px !important; height:100px !important;}
			body[yahoo] .shadow560 img 	{width:280px !important; height:9px !important;}
			
			/* Image 270 and Text  Resized */
			body[yahoo] .image270 img 	{width:280px !important; height:208px !important; display: block !important; margin-left: auto !important; margin-right: auto !important;}
			body[yahoo] .image270-2 img 	{width:280px !important; height:208px !important;}
			body[yahoo] .text270 		{width:310px !important;}
			body[yahoo] .text270-2 		{width:300px !important;}
			body[yahoo] .distance-1		{height:0px !important;}
			body[yahoo] .distance-2		{height:20px !important;}
			body[yahoo] .hideable    	{display:none !important;}
			
			/* Hideable Icon Image */
			body[yahoo] .hideable-icon  {display:none !important;}
			body[yahoo] .text-icon 		{width:320px !important;}
		
    /* End of Media Queries */
     
	</style>
</head>

<body style="width:100% !important; color:#353535; background:#f8f8f8; font-family: Helvetica,sans-serif; font-size:13px; line-height:140%; margin:0; padding:0;" yahoo="fix">


	<!-- * Header Module * -->
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr>
			<td bgcolor="#f8f8f8">						
				<!-- Tables Width -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">					
					
					<!-- Top Header -->
					<tr>
						<td>
							<table width="100%" cellpadding="10" cellspacing="0" border="0">
								<tr>
									<td height="24" valign="middle" style="font-size:11px; color:#353535; text-align:right" class="content-center">
										<!--Problem viewing this email? <a href="#" target="_blank" style="color:#353535; text-decoration:none; font-style:italic;">View it in your browser.</a>-->
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<!-- End of Top Header -->						
					
				</table>
				<!-- End of Tables Width -->				
			</td>
		</tr>	
		<tr><td height="1" bgcolor="#f1f1f1"></td></tr>
		<tr><td height="4" bgcolor="#ff580e"></td></tr>	
		<tr><td height="1" bgcolor="#dd4c0c"></td></tr>	
		<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
		<tr>
			<td bgcolor="#ffffff">
				<!-- Tables Width -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">	
					<tr>
						<td>
				
							<!-- A1 -->
							<table align="left" bgcolor="#ffffff" width="300" cellpadding="0" cellspacing="0" border="0" class="header-left">										
								<tr>
									<td width="20"></td>
																
									<!-- Logo Image -->
									<td width="247" align="left" valign="top">													
										<a href="www.asianbistro.mx" target="_blank"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/logo-header.jpg" width="160" height="100" border="0" alt="Logo Header" style="display:block; border:none; outline:none; text-decoration:none;"/></a>
									</td>
									<!-- End of Logo Image -->
																
									<td width="20"></td>
								</tr>	
							</table>
							<!-- End of A1 -->	

							<!-- Social Links -->	
							<table align="right" width="295" cellpadding="0" cellspacing="0" border="0" class="socials-right">
								<tr>
									<td width="15" bgcolor="#ffffff"></td>
									<td width="260" height="50" bgcolor="#ffffff">													
										<table border="0" cellpadding="0" cellspacing="0" align="right">
											<tr>
												<td>
													<a href="www.twitter.com/AsianBistroMx" target="_blank" style="text-decoration: none;">
														<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-twitter.jpg" width="40" height="100" border="0" alt="Twitter" title="Twitter" style="display:block; border:none; outline:none; text-decoration:none;" />
													</a>
												</td>
												<td>
													<a href="www.facebook.com/AsianBistroMx" target="_blank" style="text-decoration: none;">
														<img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/social-facebook.jpg" width="40" height="100" border="0" alt="Facebook" title="Facebook" style="display:block; border:none; outline:none; text-decoration:none;" />
													</a>
												</td>
												<td>
                                        
												</td>
											</tr>													
										</table>
													
									</td>
									<td width="20" bgcolor="#ffffff"></td>
								</tr>
							</table>
							<!-- End of Social Links -->
							
						</td>
					</tr>
				</table>
				<!-- End of Tables Width -->				
			</td>
		</tr>
		<tr><td height="1" bgcolor="#dddddd"></td></tr>	
		<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
		<tr><td height="30" bgcolor="#f8f8f8"></td></tr>		
	</table>
	<!-- * End of Header Module * -->
	

	<!-- * Image 560x200 Module + Text Module * -->
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">		
		<tr>
			<td bgcolor="#f8f8f8">						
				<!-- Tables Width -->
				<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
					<tr>	
															
							<!-- Image 560x200 -->
							<td align="center" valign="top" class="image560">													
								<a href="" target="_blank"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/image-560x200.jpg" width="560" height="200" border="0" alt="Image 560x200" style="display:block; border:none; outline:none; text-decoration:none;"/></a>
							</td>
							<!-- End of 560x200 -->	
							
					</tr>	
					<tr><td align="center" valign="top" class="shadow560"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/shadow.jpg" width="560" height="18" border="0" alt="" style="display:block; border:none; outline:none; text-decoration:none;"/></td></tr>	
					<tr><td height="10" bgcolor="#f8f8f8"></td></tr>			
				</table>
				<!-- End of Tables Width -->
			</td>
		</tr>
	</table>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr>
			<td bgcolor="#f8f8f8">						
				<!-- Tables Width -->
				<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
					<tr>
						<td width="20"></td>
						
						<!-- Title Here -->
						<td width="560" valign="top" align="left" class="inside" style="font-size: 19px; color: #353535; text-align: center; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">
						<h4>Estimado cliente su pedido </h4>
							 <span style="color: #ff580e;"><h1> #' . $folioenviar . '<BR><BR> FUE CANCELADO</h1></span>
							<h5>Si requiere mayor información se puede comunicar a la sucursal correspondiente, los datos se encuentran en la parte inferior.</h5>
						</td>	
						<!-- End of Title -->
						
						
					</tr>
				
					
				</table>
				<!-- End of Tables Width -->
			</td>
		</tr>
		<tr><td align="center" valign="top" class="image600"><img src="https://dl.dropboxusercontent.com/u/95713634/emailVistro/divider.jpg" width="600" height="60" border="0" alt="" style="display:block; border:none; outline:none; text-decoration:none;"/></td></tr>	
	</table>	
	<!-- * End of Image 560x200 Module + Text Module * -->	
	

		<!-- Tables Width -->
				<table width="600" bgcolor="#f8f8f8" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
					<tr><td colspan="3" height="20" bgcolor="#f8f8f8"></td></tr>
					<tr>
						<td width="20"></td>
						
						<!-- Content Text Here -->
						<td width="560" valign="top" align="left" class="inside" style="font-size: 12px; color: #353535; text-align: left; font-family: Helvetica, Arial, sans-serif; vertical-align: top;">							


                        <span style="color:#ff580e"><strong>Información de tu tienda</strong></span>
						<br />
						<strong>Tienda: </strong>' . $row->sucursal . '
						<br />
						<strong>Dirección: </strong> ' . $row->dirsuc . ' No. ' . $row->numsuc . ' Col. ' . $row->colsuc . ' Delg ' . $row->delsuc . ' , ' . $row->munisuc . '
						<br />
						<strong>Teléfono: </strong> ' . $row->telsuc . '
						<p></p>

                          
						</td>	
						<!-- End of Content Text -->
						
						<td width="20"></td>
					</tr>	
					<tr><td colspan="3" height="20" bgcolor="#f8f8f8"></td></tr>
					<tr>
						<td width="20"></td>
						<td width="560" align="center" class="inside">
						</td>
						<td width="20"></td>
					</tr>
				</table>
				<!-- End of Tables Width -->
			</td>
		</tr>
	</table>	


	<!-- * Footer Module * -->
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr><td height="4" bgcolor="#ff580e"></td></tr>	
		<tr><td height="1" bgcolor="#dd4c0c"></td></tr>	
		<tr><td height="5" bgcolor="#f1f1f1"></td></tr>	
		<tr>
		</tr>
	</table>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="width:100% !important; margin:0; padding:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
		<tr>
			<td bgcolor="#606060">						
				<!-- Tables Width -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#606060" class="table">	
					<tr><td height="20"></td></tr>
					<tr>
					
						<!-- Copyright -->
						<td bgcolor="#606060" align="center" style="font-size: 12px; color: #ffffff; font-weight: bold; text-align: center; font-family: Helvetica, Arial, sans-serif;">
							© 2014 Asian Bistro. Derechos Reservados. <a href="www.asianbistro.mx/PoliticasDePrivacidad-html" target="_blank" style="text-decoration: none; color: #ffffff;"><strong>Políticas de Privacidad</strong></a>
                            <br />
							<a href="www.asianbistro.mx/PoliticasDePrivacidad-html" target="_blank" style="text-decoration: none; color: #ffffff;">
							www.AsianBistro.mx </a>
						</td>
						<!-- End of Copyright -->
						
					</tr>	
					<tr><td height="20"></td></tr>					
				</table>
				<!-- End of Tables Width -->				
			</td>
		</tr>
	</table>						
	<!-- * End of Footer Module * -->

	
</body>
</html>';
            // $cabeceras = "Content-type: text/html\r\n";


            $cabeceras = 'From: servicioenlinea@asianbistro.mx' . "\r\n" .
                    'Reply-To: servicioenlinea@asianbistro.mx' . "\r\n" .
                    'Content-Type: text/html' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            if (mail($email, $asunto, $html, $cabeceras)) {
                echo "se envio";
            } else {
                echo "ni madres";
            }
        }
    }

    public function Extras() {
        $this->load->model('producto_models');
        $data['idCategoria'] = "ZEXTRAS";
        $data['idSubCategoria'] = "EXTRAS";
        $data['productos'] = $this->producto_models->mostrar($data['idCategoria'], $data['idSubCategoria']);
        $this->load->view('venta/extras_view', $data);
    }

    public function actualizarTotal() {
        $total = $this->input->post('total');
        $dataupdate = array('total' => $total);
        $this->load->model('pedido_models');
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->pedido_models->updateConfirmacion($ip, $dataupdate);
    }

    public function sessioncol() {
        $colonia = $this->input->post('colonia');
        $delegacion = $this->input->post('delegacion');
        $cp = $this->input->post('cp');
        $idSucursal = $this->input->post('idSucursal');


        session_start();
        $_SESSION["colonia_session"] = $colonia;
        $_SESSION["delegacion_session"] = $delegacion;
        $_SESSION["cp_session"] = $cp;
        $_SESSION["idSucursal_session"] = $idSucursal;
    }

    public function sessionsucursal() {
        $nom = $this->input->get('nom');
        $idSucursal = $this->input->get('idSucursal');
        session_start();
        $_SESSION["nom_session"] = $nom;
        $_SESSION["idSucursal_session"] = $idSucursal;
        $_SESSION["recogersucursal_session"] = "sucursal";


        redirect('/venta/VentOnlineCp', 'refresh');
    }

}