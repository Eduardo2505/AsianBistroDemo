<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_models extends CI_Model {
    function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

   function mostrar(){
     $this->db->where('estado',1);
     $query = $this->db->get('categoria');
     return $query;
   }

   function nomcategoria($idCategoria){
     $this->db->where('idCategoria',$idCategoria);
     $query = $this->db->get('categoria');
     $row = $query->row();
     return $row;
   }

 
}