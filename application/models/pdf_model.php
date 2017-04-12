<?php
defined("BASEPATH") OR die("El acceso al script no está permitido");

class Pdf_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    
    function getPedidos($inicial,$finalc,$Universidad,$Autorizado){
        $query = $this->db->query(" SELECT 
            p.idPedido as id,
            p.tipopago as tipo,
            p.paypal as pay,
            p.Observacion as obs,
            p.personas as per,
            p.timpo as tiem,
            p.billeteTarjeta as tarjeta,p.total as total,p.registro as registro,c.NombreCompleto
        FROM
        pedido p,cliente c 
        WHERE
        p.idCliente = c.idCliente and p.registro BETWEEN '$inicial 00:00:00' AND '$finalc 23:59:00'
        AND p.idSucursal = '$Universidad'
        AND p.estado = '$Autorizado' and p.impreso=2 and p.timpo!='CANCELACION'");

        return $query->result();

    }
     function getPedidosCancelados($inicial,$finalc,$Universidad){
        $query = $this->db->query(" SELECT 
            p.idPedido as id,
            p.tipopago as tipo,
            p.paypal as pay,
            p.Observacion as obs,
            p.personas as per,
            p.timpo as tiem,
            p.billeteTarjeta as tarjeta, p.total as total,c.NombreCompleto
        FROM
        pedido p,cliente c 
        WHERE
        p.idCliente = c.idCliente and p.registro BETWEEN '$inicial 00:00:00' AND '$finalc 23:59:00'
        AND p.idSucursal = '$Universidad'
        AND p.estado = 'Autorizado' and p.timpo='CANCELACION' and p.impreso=2");

        return $query->result();

    }

    function getClientes($inicial,$finalc,$Sucursal,$estado){
        $query = $this->db->query("SELECT 
            c.NombreCompleto, c.telefono, c.email, c.cp,p.estado,p.timpo
            FROM
            pedido p,
            cliente c
            WHERE
            p.idCliente = c.idCliente
            AND p.registro BETWEEN '$inicial 00:00:00' AND '$finalc 23:59:00'
            AND p.idSucursal = '$Sucursal'
            and p.impreso=2
            AND tipoCliente = $estado group by c.CP,c.telefono,c.email");

        return $query->result();

    }
    function getProductos($inicial,$finalc,$Sucursal){
        $query = $this->db->query("SELECT 
            p.Nombre, SUM(pe.cantidad) as total, pe.precio
            FROM
            producto p,
            pedidosproductos pe,
            pedido pd
            WHERE
            p.idProducto = pe.idProducto
            AND pe.idPedido = pd.idPedido
            AND pd.registro BETWEEN '$inicial 00:00:00' AND '$finalc 23:59:00'
            AND pd.idSucursal = '$Sucursal'
            AND pd.impreso = 2
            AND pd.estado = 'Autorizado' and pd.timpo!='CANCELACION'
            GROUP BY p.idProducto order by total desc");

        return $query->result();

    }
     function getProductoscancelados($inicial,$finalc,$Sucursal){
        $query = $this->db->query("SELECT 
            p.Nombre, SUM(pe.cantidad) as total, pe.precio
            FROM
            producto p,
            pedidosproductos pe,
            pedido pd
            WHERE
            p.idProducto = pe.idProducto
            AND pe.idPedido = pd.idPedido
            AND pd.registro BETWEEN '$inicial 00:00:00' AND '$finalc 23:59:00'
            AND pd.idSucursal = '$Sucursal'
            AND pd.impreso = 2
            AND pd.estado = 'Autorizado' and pd.timpo='CANCELACION'
            GROUP BY p.idProducto order by total desc");

        return $query->result();

    }
}
/* End of file pdf_model.php */
/* Location: ./application/models/pdf_model.php */