<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategoria_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }


  function mostrar($data){ 
   $query = $this->db->query("select 
    sc.idSubCategoria as idSubCategoria, sc.Nombre as Nombre
from
    producto p,
    subcategoria sc
where
    p.idSubCategoria = sc.idSubCategoria
        and p.idCategoria = '$data'
group by sc.Nombre
order by sc.Descripcion");//limit 0,20
   
   return $query;
 }

 function subcategiria($idsubCategoria){
     $this->db->where('idSubCategoria',$idsubCategoria);
     $query = $this->db->get('subcategoria');
     $row = $query->row();
     return $row;
   }
 
}