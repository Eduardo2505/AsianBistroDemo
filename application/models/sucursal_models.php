<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursal_models extends CI_Model {
    function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

   function mostrar(){
     $this->db->where('estado',1);
     $query = $this->db->get('sucursal');
     return $query;
   }

  

 
}