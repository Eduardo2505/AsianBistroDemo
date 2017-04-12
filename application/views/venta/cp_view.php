
<?php

$resul=$delegacion->num_rows();
if($resul==1){
 $row = $delegacion->row();
?>
	<input type="hidden"  name="colonia" id="colonia" value="<?=$row->Colonia?>" required>
	<input type="hidden"  name="delegacion" id="delegacion" value="<?=$row->Delegacion?>" required>
	<input type="hidden"  name="idSucursal" id="idSucursal" value="<?=$row->idSucursal?>" required>
	<label class="contact-form form-control "><?=$row->Colonia?></label>
	<label class="contact-form form-control "><?=$row->Delegacion ?></label>
	<?php

}else if($resul==0){
	?>

	<input type="hidden"  name="colonia" id="colonia" required>
	<input type="hidden"  name="delegacion" id="delegacion" required>
	<label class="contact-form form-control ">Colonia</label>
	<label class="contact-form form-control ">Delegación</label>
	<span style="color:red">No se puede proporcionar el servicio a este C.P</span>

	<?php


}else{
?>
 <script type="text/javascript">

					$(document).ready(function() {

						$(".btncolelg").click(function(event) {
							var cp =$(this).attr("title");

								$("#jols").load('../venta/buscarCParray/'+cp);


							});
					});




	</script>
	<div id="jols">

    <input type="hidden"  name="colonia" id="colonia" required>
	<input type="hidden"  name="delegacion" id="delegacion" required>
<?php
  echo "<spam style='color:red'>SELECIONE LA COLONIA QUE LE CORRESPONDA</spam><BR>";
						foreach($delegacion->result() as $row)
						{
							?>

							<a href="#" class="btncolelg" title="<?=$row->idColonias?>">Col. <?=$row->Colonia?><br>Delg. <?=$row->Delegacion ?></a><br>
							<br>
					       <?php


}



?>
</div>
<?php

}

?>