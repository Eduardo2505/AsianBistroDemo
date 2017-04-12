<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colonias_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

  function buscarCP($cp){
   $query = $this->db->query("select 
    c.Colonia as Colonia, c.Delegacion as Delegacion,s.idSucursal as idSucursal,c.idColonias idColonias
    from
    colonias c,
    sucursal s
    where
    c.idSucursal = s.idSucursal
    and c.CP =$cp
        and s.estado =1");//limit 0,20
  /* if ($query->num_rows() > 0)
   {
     return $query;

   }else{
     return 0;
     // return $query;
   }*/
   return $query;
 }
 function buscarCParray($cp){
   $query = $this->db->query("select 
    c.Colonia as Colonia, c.Delegacion as Delegacion,s.idSucursal as idSucursal,c.idColonias idColonias
    from
    colonias c,
    sucursal s
    where
    c.idSucursal = s.idSucursal
    and c.idColonias ='$cp'
        and s.estado =1");//limit 0,20
  /* if ($query->num_rows() > 0)
   {
     return $query;

   }else{
     return 0;
     // return $query;
   }*/
   return $query;
 }

 
}