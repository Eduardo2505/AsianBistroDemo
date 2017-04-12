<?php
	$totalventa=0;
	if (isset($pedidos)) {
		foreach($pedidos->result() as $row)
		{
			?>

			                   <li class="product">

									<div class="list-product">
										<h5><?= $row->Nombre;?></h5>
										<div class="quantity"><?= $row->cantidad;?></div>
										<?php
										$tprecio=($row->cantidad)*($row->precio);
										$totalventa+=$tprecio;
										?>
										<div class="price-product">$<?=$tprecio;?></div>
										<div class="remove-product"><i class="icon-close"></i></div>
									</div>
								</li>




			<?php
		}
	}
	?>

	                            <li class="summation">

									<div class="btn-cart">
									<div class="summation-subtotal">
										<span style="color:red">Subtotal:</span>
										<span class="amount" style="color:red">$<?=$totalventa?></span>
									</div>
										<button class="btn btn-default"><a href="<?php echo site_url('venta/Shopping') ?>">Comprar</a></button>

									</div>
								</li>