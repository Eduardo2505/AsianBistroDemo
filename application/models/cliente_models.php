<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_models extends CI_Model {
              function __construct(){
                parent::__construct();
                $this->load->database();    

              }
            
            function insertar($data){   
              
                         $this->load->model('cliente_models');
                         $this->load->model('pedido_models'); 
                         $folio=$this->cliente_models->horaServidor();
                               //echo $hora;
                        $registro=$this->pedido_models->CURRENT_TIMESTAMP();
                        $this->db->insert('cliente',array('idCliente' => "CL".$folio,
                           'NombreCompleto'=>$data['name'],
                           'telefono'=>$data['telefono'],
                           'calle'=>$data['calle'],
                           'CP'=>$data['cp'],
                           'NoInt'=>"No Int. ".$data['numint'],
                           'Noext'=>"No Ext ".$data['numexte'],
                           'colonia'=>$data['colonia'],
                           'Delegacion'=>$data['delegacion'],
                           'email'=>$data['email'],
                           'password'=>"",
                           'estado'=>1,
                           'registro'=>$registro,
                           'terminos'=>$data['terminos'],
                           'notificaciones'=>$data['notificaciones'],
                           'notedad'=>$data['notedad'],
                           'tipoCliente' => $data['tipoCliente']
                           ));
                         $tipovefi=$data['tipoPago'];
                         $edoPedido="";
                         switch ($tipovefi) {
                          case "PayPal":
                          $edoPedido="Proceso";
                          break;
                          case "Efectivo":
                          $edoPedido="Autorizado";
                          break;
                          default:
                          $edoPedido="Autorizado";
                        }


                        // Actualizar los pedidos
                        $dataupdate = array(
                          'idPedido' => "TI".$folio,
                          'idSucursal' => $data['idSucursal'],
                          'idCliente' => "CL".$folio,
                          'Estado' => $edoPedido,
                          'paypal' => "",
                          'Observacion' => $data['comentario'],
                          'personas' => $data['personas'],
                          'billeteTarjeta' => $data['cambiTarjeta'],
                          'tipopago' => $data['tipoPago'],  
                          'calles' => $data['callesentre']);
                         $ip=$_SERVER['REMOTE_ADDR']; 
                        
                         
                         $this->pedido_models->updateConfirmacion($ip,$dataupdate);

                        return array($data['tipoPago'],"TI".$folio);
            }
            function horaServidor(){   
                  $query = $this->db->query("SELECT CURDATE() + 0 as fecha,(select count(*)+1 from cliente) as total");//limit 0,20
                  $row = $query->row(); 
                  $folio= $row->fecha."".$row->total;     
                  return $folio;
                }


          
                
  }