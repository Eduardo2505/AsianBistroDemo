<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategoria_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }


  function mostrar($data){ 

$sql="select 
    sc.idSubCategoria as idSubCategoria, sc.Nombre as Nombre
from
    producto p,
    subcategoria sc
where
    p.idSubCategoria = sc.idSubCategoria
        and p.idCategoria = '$data' group by sc.idSubCategoria order by sc.Descripcion";

   $query = $this->db->query($sql);
   
    return $query;
 }

 function subcategiria($idsubCategoria){
     $this->db->where('idSubCategoria',$idsubCategoria);
     $query = $this->db->get('subcategoria');
     $row = $query->row();
     return $row;
   }
 
}