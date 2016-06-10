function realizarPedido(){

 var codigo = $('#codusu').val();
 var bruto = $('#ro_total_distribuidor').val();


	 $.ajax({
		 	type: 'post',
		 	url : '../control/control_pedido.php',
		 	data: {codigo: codigo, bruto: bruto},
		success: function(){

		}	 	
	 });




















}
