



							<script type="text/javascript">
								$(document).ready(function() {
									$('.btn-color').click(function() {
										var tiempo = $(this).attr('title');
										var idPedido = $(this).attr('name');
										var sucursal = $("#contact").attr('title');
										var dataString = 'idPedido='+idPedido+'&time='+tiempo+'&sucursal='+sucursal;                        
										$.ajax({
											type: "POST",
											url: "../../navegar/updateTiempo",
											data: dataString,
											success: function(data) {
                                	//alert(data);
                                	$("#emailver").load('../../venta/enviarEmailconfirmacion/'+idPedido);
                                	$('#verActualizar').html(data);

                                }
                            });
									});
								});

							</script>
							<div id="emailver" style="display:none"></div>
							<table width="100%">
								<tr><th style="text-align:center"><h2>IDPEDIDO</h2></th><th style="text-align:center"><h2>TIEMPOS</h2></th></tr>

								<?php
								if (isset($pedidos)) {
									foreach($pedidos->result() as $row)
									{
										?>



										<div class="product-btn">

											<tr><td><h3><?= $row->idPedido;?></h3></td>
												<td>
													<a href="#" title="15" name="<?php echo $row->idPedido; ?>" class="btn btn-color">15</a>
													<a href="#" title="30" name="<?php echo $row->idPedido; ?>" class="btn btn-color">30</a>
													<a href="#" title="45" name="<?php echo $row->idPedido; ?>" class="btn btn-color">45</a>										
													<a href="#" title="60" name="<?php echo $row->idPedido; ?>" class="btn btn-color">60</a>
													<a href="#" title="75" name="<?php echo $row->idPedido; ?>" class="btn btn-color">75</a>
													<a href="#" title="90" name="<?php echo $row->idPedido; ?>" class="btn btn-color">90</a>
													<a href="#" title="CANCELACION" name="<?php echo $row->idPedido; ?>" class="btn btn-color">CANCELACION</a>
												</td>
											</tr>





										</div>





										<?php
									}
								}

								?>


							</table>



