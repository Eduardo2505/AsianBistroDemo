<?php
class Enviaremail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function sendMailGmail()
	{
		//cargamos la libreria email de ci
		$this->load->library("email");

		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' =>  587,
			'smtp_user' => 'eduardopadilla@gmail.com',
			'smtp_pass' => 'Eduardo90%',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    

		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);

		$this->email->from('Eduardo Padilla');
		$this->email->to("conwereduardopc@hotmail.com");
		$this->email->subject('Bienvenido/a a uno-de-piera.com');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
	}

	public function sendMailYahoo()
	{
		//cargamos la libreria email de ci
		$this->load->library("email");

		//configuracion para yahoo
		$configYahoo = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.mail.yahoo.com',
			'smtp_port' => 587,
			'smtp_crypto' => 'tls',
			'smtp_user' => 'emaildeyahoo',
			'smtp_pass' => 'password',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		); 

		//cargamos la configuración para enviar con yahoo
		$this->email->initialize($configYahoo);

		$this->email->from('correo que envia los emails');//correo de yahoo o no funcionará
		$this->email->to("correo que recibe el email");
		$this->email->subject('Bienvenido/a a uno-de-piera.com');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de yahoo</h2><hr><br> Bienvenido al blog');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());

	}

	public function pp()
	{
$para      = 'conwereduardopc@hotmail.com';
$titulo = 'El título';
$mensaje = '<h1>Hola ñoño lápiz</h1>';
$cabeceras = 'From: servicioenlinea@asianbistro.mx' . "\r\n" .
    'Reply-To: servicioenlinea@asianbistro.mx' . "\r\n" .
    'Content-Type: text/html' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
	}
}