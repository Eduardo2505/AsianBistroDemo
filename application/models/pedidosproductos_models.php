<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pedidosproductos_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }


  function insertar($data1,$data2,$data3,$ip,$registro){  


      $this->db->insert('pedidosproductos',array('idPedido' => $ip,
       'cantidad'=>$data3,
       'precio'=>$data2,
       'idProducto'=>$data1,
       'registro'=>$registro
       ));
    }


     function updateCantidad($id, $cantidad) {
              $data = array(
             'cantidad' => $cantidad
              );
             $this->db->where('idPedidosProductos', $id);
             return $this->db->update('pedidosproductos', $data);
        }

        function eliminar($id)
        {
          $this->db->where('idPedidosProductos', $id);
          return $this->db->delete('pedidosproductos');
        }

     function buscar($ip){
     $this->db->where('idPedido',$ip);
     $query = $this->db->get('pedidosproductos');
     return $query;
   } 
}

