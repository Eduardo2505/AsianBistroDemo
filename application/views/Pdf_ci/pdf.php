<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte</title>
     <style type="text/css">
     body{
      font-size:9;
     }
       
 
  
 
        h1 {
         color: #444;
         background-color: transparent;
         border-bottom: 1px solid #D0D0D0;
         font-size: 16px;
         font-weight: bold;
         margin: 24px 0 2px 0;
         padding: 5px 0 6px 0;
        }
 
        h2 {
         color: #444;
         background-color: transparent;
         border-bottom: 1px solid #D0D0D0;
         font-size: 16px;
         font-weight: bold;
         margin: 24px 0 2px 0;
         padding: 5px 0 6px 0;
         text-align: center;
        }
 
        table{
            text-align: left;
        }
 
        /* estilos para el footer y el numero de pagina */
        @page { margin: 180px 50px; }
        #header { 
            position: fixed; 
            left: 0px; top: -180px; 
            right: 0px; 
            height: 20px;       
            text-align: center; 
        }
        #footer { 
            position: fixed; 
            left: 0px; 
            bottom: -180px; 
            right: 0px; 
            height: 20px;
            text-align: center;             
          
        }
        #footer .page:after { 
            content: counter(page, decimal); 
        }
    </style>
</head>
<body>
    <!--header para cada pagina-->
    <div id="header">
       <a href="<?php echo site_url('navegar/Administrador') ?>"> <img src="img/logo2.png" alt=""></a>
        <h1>REPORTE DEL DIA <?php echo $inicial; ?> a <?php echo $finalc;?>  </h1>
    </div>
    <!--footer para cada pagina-->
    <div id="footer">
        <!--aqui se muestra el numero de la pagina en numeros romanos-->
        <p class="page"></p>
    </div>
  <h2> Pedidos Autorizados</h2>
    <table style="width:700px">
        <thead >
            <tr>
                <th >IdPedido</th>
                 <th >Nombre</th>
                
                <th >Paypal</th>
                <th >Adicionales</th>
                <th >Prs</th>
                <th >Registro</th>
                <th >Tiem</th>
                <th >B/T</th>
                <th >Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
$coni=1;$sum=0;
             foreach($provincias as $provincia) { ?>
            <tr>
                <td><?php echo $coni.'.-'.$provincia->id ?></td>
                 <td><?php echo $provincia->NombreCompleto ?></td>
               
                 <td><?php echo $provincia->pay ?></td>
                  <td><?php echo $provincia->obs ?></td>
                   <td><?php echo $provincia->per ?></td>
                    <td><?php echo $provincia->registro?></td>
                    <td><?php echo $provincia->tiem ?></td>                   
                    <td><?php echo $provincia->tarjeta?></td>
                     <td>$ <?php echo $provincia->total?></td>
            </tr>
            <?php $coni++;
$sum+=$provincia->total;
            } ?>
             <tr>
                <th ></th>
                <th ></th>
                <th ></th>
                <th ></th>
               <th ></th>
               <th ></th>
              
                <th ></th>
                <th >TOTAL</th>
                <th >$ <?php echo $sum;?></th>
            </tr>
        </tbody>
    </table>
    <h2>Pedidos Cancelados</h2>
    <table style="width:700px">
        <thead >
            <tr>
                <th >IdPedido</th>
                <th >Nombre</th>
                <th >Tipo Pago</th>
                <th >Paypal</th>
                <th >Adicionales</th>
                <th >Personas</th>                
                <th >Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
$conic=1;$sumc=0;
             foreach($provinciac as $provinciac) { ?>
            <tr>
                <td><?php echo $conic.'.-'.$provinciac->id ?></td>
                <td><?php echo $provincia->NombreCompleto ?></td>
                <td><?php echo $provinciac->tipo ?></td>
                 <td><?php echo $provinciac->pay ?></td>
                  <td><?php echo $provinciac->obs ?></td>
                   <td><?php echo $provinciac->per ?></td>                   
                     <td>$ <?php echo $provinciac->total?></td>
            </tr>
            <?php $conic++;
$sumc+=$provinciac->total;
            } ?>
             <tr>
                <th ></th>
                <th ></th>
                <th ></th>
                <th ></th>
                <th ></th>
              
              
                <th >TOTAL</th>
                <th >$ <?php echo $sumc;?></th>
            </tr>
        </tbody>
    </table>
    <h2>Clientes Nuevos</h2>
    <table style="width:700px">
        <thead >
            <tr>
                <th >Nombre</th>
                <th >Telefono</th>
                <th >email</th>
                <th >CP</th>
               
               
            </tr>
        </thead>
        <tbody>
            <?php
$conicf=1;
             foreach($clientenuevo as $provinciaf) { 

              ?>
            <tr>
                <td><?php echo $conicf.'.-'.$provinciaf->NombreCompleto; ?></td>
                <td><?php echo $provinciaf->telefono ?></td>
                 <td><?php echo $provinciaf->email ?></td>
                  <td><?php echo $provinciaf->cp ?></td>
                  
                   
            </tr>
            <?php $conicf++;
            } ?>

        </tbody>
    </table>
    <h2>Clientes Frecuentes</h2>
    <table style="width:700px">
        <thead >
            <tr>
                <th >Nombre</th>
                <th >Telefono</th>
                <th >email</th>
                <th >CP</th>
               
               
            </tr>
        </thead>
        <tbody>
            <?php
$conicfn=1;
             foreach($clientesFrecuentes as $provinciafn) { ?>
            <tr>
                <td><?php echo $conicfn.'.-'.$provinciafn->NombreCompleto; ?></td>
                <td><?php echo $provinciafn->telefono ?></td>
                 <td><?php echo $provinciafn->email ?></td>
                  <td><?php echo $provinciafn->cp ?></td>
                 
                   
            </tr>
            <?php $conicfn++;
            } ?>

        </tbody>
    </table>
    <h2>Productos Vendidos</h2>
    <table style="width:700px">
        <thead >
            <tr>
                <th >Nombre</th>
                <th >Cantidad</th>
                <th >Costo</th>
                <th >Total</th>
           
               
            </tr>
        </thead>
        <tbody>
            <?php
$pro=1; $sub=0; $sumita=0;
             foreach($productos as $productosv) {
                 $cantida=$productosv->total;
                 $precio=$productosv->precio;
                 $sub=$cantida*$precio;
                 $sumita+=$sub;
              ?>
            <tr>
                <td><?php echo $pro.'.-'.$productosv->Nombre; ?></td>
                <td><?php echo $cantida ?> pza</td>
                 <td> $ <?php echo $precio ?></td>
                  <td> $ <?php echo $sub ?></td>
                  
                   
            </tr>
            <?php $pro++;
            } ?>
<tr>
                <th ></th>
                <th ></th>
                <th >TOTAL</th>
                <th >$ <?php echo $sumita ?></th>
           
               
            </tr>
        </tbody>
    </table>
    <h2>Productos Cancelados</h2>
    <table style="width:700px">
        <thead >
            <tr>
                <th >Nombre</th>
                <th >Cantidad</th>
                <th >Costo</th>
                <th >Total</th>
           
               
            </tr>
        </thead>
        <tbody>
            <?php
$proc=1; $subc=0; $sumitac=0;
             foreach($productosc as $productosvc) {
                 $cantidac=$productosvc->total;
                 $precioc=$productosvc->precio;
                 $subc=$cantidac*$precioc;
                 $sumitac+=$subc;
              ?>
            <tr>
                <td><?php echo $proc.'.-'.$productosvc->Nombre; ?></td>
                <td><?php echo $cantidac ?> pza</td>
                 <td> $ <?php echo $precioc ?></td>
                  <td> $ <?php echo $subc ?></td>
                  
                   
            </tr>
            <?php $proc++;
            } ?>
<tr>
                <th ></th>
                <th ></th>
                <th >TOTAL</th>
                <th >$ <?php echo $sumitac ?></th>
           
               
            </tr>
        </tbody>
    </table>
</body>
</html>