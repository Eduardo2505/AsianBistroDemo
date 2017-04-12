<script type="text/javascript">
									$(document).ready(function() {
										$(".filterPro").click(function(event) {
											var url = $(this).attr("title");

									        $("#Productosmostrar").load('../venta/Productos/'+url);

									    });
									});

								</script>
				<li>
 			       <?php
 if (isset($subcategorias)) {
 	foreach($subcategorias->result() as $row)
 	{
 		?>
 		<li>
 			<span class="filterPro" title="<?=$idCategoria?>/<?= $row->idSubCategoria;?>"><?= $row->Nombre;?></span>
 		</li>
 		<?php
 	}
 }
 ?>


