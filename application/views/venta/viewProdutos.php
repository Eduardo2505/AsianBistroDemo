
<script type="text/javascript">
	$(document).ready(function() {
		$(".addproducto").click(function(event) {
			var url = $(this).attr("title");
			var name = $(this).attr("name");
			var cantida = String($("#"+name).val());
			//alert(cantida);

			var urlpro = url+cantida;
			//alert('venta/addPedido/'+urlpro);
			if(cantida==''||cantida=='0'){
				error();
			}else{

			$("#carritoviwe").load('../venta/addPedido/'+urlpro);
			ok();
		   }


		});
	});
	function ok(){
		alertify.success("Se agrego Correctamente <a href=\"<?php echo site_url('venta/Shopping') ?>\" style=\"color:white;\"><b>COMPRAS</b></a>");
		return false;
	}
     function error(){
        //una notificación de error
      alertify.error("La cantidad debe de ser mayor a 0"); 
      return false; 
   }
	function ValidaSoloNumeros() {
		if ((event.keyCode < 48) || (event.keyCode > 57))
			event.returnValue = false;
	}
</script>




<div class="row">
	<div class="col-xs-12 menu-category sticky-header sticky-header first-header fixed visible">
		<h2> <?=$idCategoria?>/<?=$idSubCategoria?></h2>
	</div>
</div>
<style>
	.wrapper {
		overflow: hidden;
		padding: 1% 0 4% 0;
	}

/************************************************************************************
COLUMN
*************************************************************************************/
.col {

	float: left;
	margin-left: 3.2%;
	margin-bottom: 30px;
	height:330px;
	padding-top: 3%;

}

.fullwidth .col {
	float: none;
	margin-left: 0;
}
/* grid4 col */
.grid4 .col {
	width: 22.6%;
}
/* grid3 col */
.grid3 .col {
	width: 31.2%;
}
/* grid2 col */
.grid2 .col {
	width: 48.4%;
}
/* clear col */
.grid4 .col:nth-of-type(4n+1),
.grid3 .col:nth-of-type(3n+1),
.grid2 .col:nth-of-type(2n+1) {
	margin-left: 0;
	clear: left;
}
/* reset cols to fullwidth */
@media screen and (max-width: 400px) {
	/* grid4 */
	.col {
		width: 100% !important;
		margin-left: 0 !important;
		clear: none !important;
	}
}
.titulo{
	color: #4E4E4E;
	padding: 1% 1% 1% 1%;
	font-weight: bold;
}
.titulo2{
	color: #4E4E4E;
	padding: 1% 1% 1% 1%;
	font-weight: bold;
	font-size:14px;
	padding: 2% 6% 10% 6% ;
	text­align: justify;
}
.precio{
	color: red;
	font-size: 23px;

	font-weight: bold;

}
</style>
<div class="row items-content">
	<div class="wrapper grid4">
		<?php
		$par=2;
		$color="";
		if (isset($productos)) {
			foreach($productos->result() as $row)
			{

				?>


				<article class="col" style="background: #eee;">


					<div class="titulo"><?= $row->Nombre;?></div>
					<div class="precio">$<?= $row->precio;?></div>

					<div class="titulo2"><?= $row->Descripcion;?><div class="titulo">




						<input type="tel" onkeypress="ValidaSoloNumeros()" maxlength="2" id="<?= $row->idProducto;?>" placeholder="Cantidad">
						<div class="shop-button"><a href="#" name="<?= $row->idProducto;?>" title="<?= $row->idProducto;?>/<?= $row->precio;?>/" class="btn btn-default btn-sm addproducto">Agregar</a></div>

						<br>
					</article>




					<?php
					$par++;
				}
			}
			?>
		</div>
	</div>

