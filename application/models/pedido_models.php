<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pedido_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

//### insertar compuesto productos
  function insertar($ip,$registro){   
      $this->load->model('pedido_models');
      $this->db->insert('pedido',array('idPedido' => $ip,
       'estado'=>'Pendiente',
       'impreso'=>0,
       'registro'=>$registro
       ));
    }

//##compuesto#
    function mostrar(){
    
      $ip=$_SERVER['REMOTE_ADDR'];
     
      $query = $this->db->query("SELECT 
      pe.idPedidosProductos AS idPedidos,
      p.Nombre AS Nombre,
      pe.cantidad AS cantidad,
      pe.precio AS precio,
      p.url AS url,
      p.Descripcion Descripcion
      FROM
      pedidosproductos pe,
      producto p,
      pedido pedi
      WHERE
      p.idProducto = pe.idProducto
      AND pedi.idPedido = pe.idPedido
      AND pe.idPedido = '$ip'
        AND pedi.estado = 'Pendiente'");//limit 0,20
     return $query;
   }
   //paypalproductos
   function mostrarpaypal($ip){
      $query = $this->db->query("SELECT 
      pe.idPedidosProductos AS idPedidos,
      p.Nombre AS Nombre,
      pe.cantidad AS cantidad,
      pe.precio AS precio,
      p.url AS url,
      p.Descripcion Descripcion
      FROM
      pedidosproductos pe,
      producto p,
      pedido pedi
      WHERE
      p.idProducto = pe.idProducto
      AND pedi.idPedido = pe.idPedido
      AND pe.idPedido = '$ip'
        AND pedi.estado = 'Proceso'");//limit 0,20
     return $query;
   }
   ///#Copuesto##
   function mostrarporfolio($ip,$estado){

     $query = $this->db->query("SELECT 
    pe.idPedido AS idPedido
FROM
    pedido pe
WHERE
    pe.idPedido = '$ip'
        AND pe.estado = '$estado'");//limit 0,20
     return $query;
   }

   ///COmpuesta############
   function mostrarDatosPedido($ip){
    $query = $this->db->query("SELECT 
    c.NombreCompleto AS nombrecli,
    c.telefono AS telcli,
    c.calle AS callecli,
    c.cp AS cpcli,
    c.colonia AS colcli,
    c.Delegacion AS delcli,
    c.Noext AS noexcli,
    c.NoInt AS noincli,
    c.email AS emailcli,
    s.Sucursal AS sucursal,
    s.direccion AS dirsuc,
    s.delgSucursal AS delsuc,
    s.colSucursal AS colsuc,
    s.Numero AS numsuc,
    s.telefono AS telsuc,
    s.email AS emailsuc,
    s.municipio AS munisuc,
    pe.Observacion AS obser,
    pe.idPedido AS idPedido,
    pe.timpo as tiempo,
    pe.tipopago as tipopago,
    pe.billeteTarjeta as billeteTarjeta,
    pe.personas as personas
FROM
    pedido pe,
    sucursal s,
    cliente c
WHERE
    pe.idSucursal = s.idSucursal
        AND pe.idCliente = c.idCliente
        AND pe.estado = 'Autorizado'
        AND pe.idPedido = '$ip'
        AND c.estado = 1
        AND s.estado = 1");

     return $query;

   }
   
//compuesto
   function updateConfirmacion($id, $data) {

    $this->db->where('idPedido', $id);
    return $this->db->update('pedido', $data);
  }


  function actualizarPedido($ip){
   $this->load->model('pedido_models');
   $dataupdate = array(
    'Estado' => 'Autorizado'
    );
   $pedidos=$this->pedido_models->mostrarporfolio($ip); 
   foreach($pedidos->result() as $rowp) 
   { 
    echo $rowp->idPedidos;
    $this->pedido_models->updateConfirmacion($rowp->idPedidos,$dataupdate);
  }
  $query = $this->db->query("select 
    pe.idPedidos as idPedidos,
    p.Nombre as Nombre,
    pe.cantidad as cantidad,
    pe.precio as precio, p.url as url,p.Descripcion Descripcion
    from
    pedidos pe,
    producto p
    where
    p.idProducto = pe.idProducto
      and pe.ip = '$ip' and pe.estado = 'Autorizado'");//limit 0,20
  return $query;         

}

//Esta correcta
function CURRENT_TIMESTAMP(){   
                  $query = $this->db->query("SELECT CURRENT_TIMESTAMP() as fecha");//limit 0,20
                  $row = $query->row();                       
                  return $row->fecha;
                }


//compuesto
function mostrarPedidosAutorizados($ip){

                 $query = $this->db->query("SELECT 
    pe.idPedido AS idPedidos,
    p.Nombre AS Nombre,
    pe.cantidad AS cantidad,
    pe.precio AS precio,
    p.url AS url,
    p.Descripcion AS Descripcion
FROM
    pedidosproductos pe,
    producto p
WHERE
    p.idProducto = pe.idProducto
        AND pe.idPedido = '$ip'");//limit 0,20
                 return $query;   

               }
// compuesta
         function pedidosver($idSucursa){
              $this->db->where('idSucursal', $idSucursa);
              $this->db->where('impreso',1);
              $query = $this->db->get('pedido');
              return $query;   

         } 

              function verficarCliente($cp,$telefono,$emai){
               $query = $this->db->query("SELECT 
    COUNT(*) as total
FROM
    cliente
WHERE
    CP = $cp AND telefono = '$telefono'
        AND email = '$emai'");//limit 0,20
                 return $query;      

         }

   function buscar($ip){
     $this->db->where('idPedido',$ip);
     $query = $this->db->get('pedido');
     return $query;
   }         


 function horaServicio(){   
                  $query = $this->db->query("SELECT CURTIME() as hora");//limit 0,20
                  $row = $query->row(); 
                  return $row->hora;
                }
}