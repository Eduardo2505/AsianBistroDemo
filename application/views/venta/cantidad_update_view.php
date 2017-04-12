<input type="tel" onkeypress="ValidaSoloNumeros()" lang="<?=$idPedido;?>" step="1" title="<?=$precio;?>" name="" value="<?= $cantidad;?>"  class="input-text qty text" size="4">
<script type="text/javascript">


						$(document).ready(function() {
							$(".qty").blur(function(event) {

								var castring =String($(this).val());
							   
								if(castring==''||castring=='0'){
									error();							    
								}else{
								
								var cantidad =parseInt(castring);								
								var precio = parseInt($(this).attr("title"));
								var idtotal = $(this).attr("lang");
								$("#input"+idtotal).load('../venta/updateCatidad/'+idtotal+'/'+cantidad+'/'+precio);
								var sum=cantidad*precio;
								$("#in"+idtotal).val(sum);
								$("#"+idtotal).html("$ "+sum);
								suma_y_muestra();
							}

							});
						});
						function suma_y_muestra() {
							var sumta=0;
							$(".tcuenta").each(function(i){
								var sum =parseInt($(this).val());
								sumta+=sum

							});
							    var empa=parseFloat(sumta)*.05;
								var totalsum=parseFloat(empa)+parseFloat(sumta);
								var iva=(totalsum)*.16;
								var sub=(totalsum)/1.16;

								$("#empaquespan").html("$ "+empa.toFixed(2));
								$("#summostrartotal").html("$ "+sumta);
								$("#ivaspan").html("$ "+iva.toFixed(2));
								$("#subtotalsan").html("$ "+sub.toFixed(2));
								$("#total").html("$ "+totalsum.toFixed(2));
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