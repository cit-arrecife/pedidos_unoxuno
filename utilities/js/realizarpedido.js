document.write('<script src="../utilities/js/Adicionales.js" type="text/javascript"></script>');
function realizarPedido(){


	$('#btnPedido').hide();
	$('#Mtitulo').html('Realizando su Pedido');
	$('#Mfooter').hide();
	$('#modalError').modal({backdrop: 'static', keyboard: false});
 	var codigo = $('#codusu').val();
 	var bruto = SinF($('#ro_subtotal_distribuidor').text());
 	var descu =$('#ro_total_distribuidor').text();
 	var referenciaP  = $('#referencias_order').val();
 	var observacionP = $('#observaciones_order').val();
 	//console.log(referenciaP+'   --    '+observacionP)
 	 $.ajax({
		 	type: 'post',
		 	url : '../control/control_pedido.php',
		 	data: {codigo: codigo, bruto: bruto, referenciaP: referenciaP, observacionP:observacionP},
		success: function(data){
			$('#load').hide();
			$('#nrodcto').text('El numero del pedido es '+ data);
 			$('#Mtitulo').html('Pedido realizado Con exito');
			$('#Mfooter').show();
		}	 	
	 });


}

// function porahora(){

// 	$('#btnPedido').hide();
// 	$('#Mtitulo').html('Realizando su Pedido');
// 	$('#Mfooter').hide();
// 	$('#modalError').modal({backdrop: 'static', keyboard: false});

// }
