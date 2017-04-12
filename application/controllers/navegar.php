<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navegar extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->helper('url');
         $this->load->helper('form');
        //$this->load->helper('html');
	}
	
	public function Home()
	{
		
		$this->load->view('navegar/inicio');
	}
	
	
	public function RegistrodeInformacion()
	{
		$this->load->model('pedido_models');
		$vatime=$this->pedido_models->horaServicio();	
	    if($vatime > "13:00:00" AND $vatime < "21:30:00"){
		$ip=$_SERVER['REMOTE_ADDR'];		
		$info=$this->pedido_models->buscar($ip); 
        $numres = $info->num_rows(); 
        //echo $numres;      
        if($numres==0){
         redirect('/venta/Shopping', 'refresh');
        }else{

           	session_start();
        	if (isset($_SESSION['recogersucursal_session'])) {
              $this->load->view('navegar/Comprasursal_view');
			}else{
              $this->load->view('navegar/InformacionCompra_view');
             }
        }
		}else{
 			$this->load->view('venta/fuera_de_servicio');

		}
	}

	public function paypal()
	{
		
		$this->load->view('navegar/paypal_view');
	}

	public function paypalError()
	{
		
		
		$this->load->view('navegar/error_transactionpaypal_view');
	}
	public function system($valor=FALSE)
	{
		$data['suscu']=$valor;
		$this->load->model('pedido_models');
		$data['pedidos']=$this->pedido_models->pedidosver($data['suscu']);	
		
		$this->load->view('navegar/system',$data);
	}
	public function systemrefresh()
	{
		$idsucursal=$this->input->post('idSucursal');
		$this->load->model('pedido_models');
		$data['pedidos']=$this->pedido_models->pedidosver($idsucursal);
		$this->load->view('navegar/systemrefresh_view',$data);
	}
	public function Administrador()
	{
		
		
		$this->load->view('navegar/admin_view');
	}

    public function updateTiempo()
	{
		$this->load->model('pedido_models');
		$idpedido=$this->input->get('idPedido');		
		$dataupdate = array('timpo' => $this->input->post('time'),
			                'impreso' => 2);
        $this->pedido_models->updateConfirmacion($idpedido,$dataupdate);
       
       

	}


	public function paypalSucess($valor=FALSE)	
   {
   	$this->load->model('pedido_models');
	$data['idpedido']=$valor;
	$dataupdate = array('estado' => 'Autorizado');
    $this->pedido_models->updateConfirmacion($data['idpedido'],$dataupdate);
    $this->load->view('navegar/enviarpedido_paypal',$data);
	  
	}
   public function paypalSucessreturn()	
      {
	   
	   $this->load->view('navegar/confirmacion_papay_view');
	 }

}