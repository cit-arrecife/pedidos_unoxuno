	document.write('<script src="../utilities/js/Adicionales.js" type="text/javascript"></script>');
	//Encabezado
		var idCliente, nombreCliente, fechaCotizacion
		//detalles
		var nombreEspacio, tipoProducto,tipoPresentacion, tipoTela, tela, colorTela
		//detalles
		var cantidadProducto, anchoProducto, altoProducto, descuentoDistri, descuentoAddic
		//Adicionales
		var coverLight, dirTela, juntoItem, mando, mismoCabezal, perfil, sentido, soporteIntermedio, Motor
		//costos
		var valorUnitario, subtotal, iva, total, estadoPedido
		//estaticas
		var facturado=0; var origen='FAC'; var tipodcto='FR'; ;
		
		//asignar valores a las variables
		var idusuario= $('#codusu').val();
		var fechaCotizacion = new Date;
		
		//estaticas producto

	//	var Adicionales[];

	function agregarProducto(){
		//console.log('entro a agregarproductos');
		// if(validar()){
		var idusuario= $('#codusu').val();
		$.ajax({
	        data:  {opcion : 'trade',
	        		facturado: facturado,
	        		idusuario:idusuario,
	        		origen:origen,
	        		tipodcto:tipodcto
	        		},
	        url:   '../control/registro.php',
	        type:  'post',
	      
	        success:  function (response) {
					
					//console.log('Trade OK');
					Productos();
				        }
		}); // final
		// }else{
		// $('#modalError').modal({backdrop: 'static', keyboard: false});
		// }

}


	function Productos (){
		//console.log('entro a productos');
		var idusuario= $('#codusu').val();
		var Iva=16;
		var valorUnitario;
		nombreEspacio = $('#producto_nombre_espacio').val();
		tipoProducto = $('#producto_tipo').val();
		tipoPresentacion = $('#producto_tipo_presentacion').val();
		tipoTela = $('#producto_tipo_tela').val();
		tela = $('#producto_tela').val();
		colorTela = $('#producto_tela_color').val();


		cantidadProducto = $('#producto_cantidad').val();
		anchoProducto = $('#producto_ancho').val();
		altoProducto = $('#producto_alto').val();
		descuentoDistri = $('#producto_descuento_distribuidor').val();
		descuentoAddic = $('#producto_descuento_adicional').val();
		valorUnitario =$('#da_producto_subtotal').text();
		var detalle =nombreEspacio+' '+tipoProducto+'-'+tipoPresentacion+'-'+tipoTela+'-'+tela+'-'+colorTela;
		var producto='';
		$.each(Adicionales, function(index, val){
			producto=producto+val+', ';
		});
		console.log('el producto '+ producto);
		//console.log('hizo variables');
		$.ajax({
	        data:  {opcion : 'mvtrade',
	        		cantidad:cantidadProducto,
	        		descuentoDistri:descuentoDistri,
	        		detalle: detalle,
	        		iva:Iva,
	        		valoruni: valorUnitario,
	        		alto:altoProducto,
	        		ancho:anchoProducto,
	        		idusuario:idusuario,
	        		producto:producto
	        		},
	        url:   '../control/registro.php',
	        type:  'post',
	      
	        success:  function (response) {
					
				//	console.log('MVTRADE Producto okr');
					$('#modalRegistroVenta').modal({backdrop: 'static', keyboard: false});
				        }
		}); // fina


}
var Adicionales=[];

function adicional(adicional,valor, id){
	//console.log('Adicional :'+ adicional+ '  valor :' + valor);
	if(Adicionales.length ==0){
		Adicionales.push(adicional+':'+valor);
	//	console.log(JSON.stringify(Adicionales));
	//	console.log(Adicionales.length);
	}
	//var estado=0;
	$.each(Adicionales, function(index, val){
		if(val.search(adicional) == -1){
			//alert('Indice '+index +' - Array '+ Adicionales.length);
			if(index == Adicionales.length-1){
				Adicionales.push(adicional+':'+valor);
		//		console.log(JSON.stringify(Adicionales));
			}
		}
		else{
					//console.log('Entro al else encontro cadena '+ valor);
			if(valor=='SELECCIONE'){
				//console.log('Valor coincide con if para remover');
				Adicionales.splice(index, 1);
		//		console.log(JSON.stringify(Adicionales));
				if(Adicionales.length ==0){
			//		console.log('elimino ahora quedan '+ Adicionales.length)
					return;}
			}
			else{
		//		console.log('Se va a eliminar la opcion '+Adicionales[index]);
				Adicionales.splice(index, 1);
				Adicionales.push(adicional+':'+valor);
				//Adicionales[index]=adicional+':'+valor;
		//		console.log(JSON.stringify(Adicionales));

			}
		}

	});
	if(id != ''){
	 setTimeout ("sumarAdicionales('#"+id+"');", 500);
	}
//	if(estado!=0){
//			Adicionales.push(adicional+':'+valor);
//			console.log(JSON.stringify(Adicionales));
//	}
	
}






