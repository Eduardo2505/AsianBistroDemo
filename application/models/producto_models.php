<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_models extends CI_Model {
    function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

   function mostrar($idCategoria,$idSubcategia){
     $this->db->where('estado',1);
     $this->db->where('idCategoria', $idCategoria);
     $this->db->where('idSubCategoria', $idSubcategia);
     $query = $this->db->get('producto');
     return $query;
   }

 
}