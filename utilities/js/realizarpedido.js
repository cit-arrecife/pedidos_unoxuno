function realizarPedido(){


	$('#btnPedido').hide();
	$('#Mtitulo').html('Realizando su Pedido');
	$('#Mfooter').hide();
	$('#modalError').modal({backdrop: 'static', keyboard: false});
 	var codigo = $('#codusu').val();
 	var bruto = $('#ro_total_distribuidor').text();
 	 $.ajax({
		 	type: 'post',
		 	url : '../control/control_pedido.php',
		 	data: {codigo: codigo, bruto: bruto},
		success: function(data){
			$('#nrodcto').text('El numero del pedido es '+ data);
 			$('#Mtitulo').html('Pedido realizado Con exito');
			$('#Mfooter').show();
		}	 	
	 });





















}
