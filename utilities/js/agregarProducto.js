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



	function agregarProducto(){
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
	        		idusuario:idusuario
	        		},
	        url:   '../control/registro.php',
	        type:  'post',
	      
	        success:  function (response) {
					
				//	console.log('MVTRADE Producto okr');
					$('#modalRegistroVenta').modal({backdrop: 'static', keyboard: false});
				        }
		}); // fina









}
	// coverLight = $('#').val();
		// precioCL= $('#').val();
		// dirTela = $('#').val();
		// precioDT= $('#').val();
		// juntoItem = $('#').val();
		// precioJI= $('#').val();
		// mando = $('#').val();
		// precioM= $('#').val();
		// mismoCabezal = $('#').val();
		// precioMC= $('#').val();
		// perfil = $('#').val();
		// precioP= $('#').val();
		// sentido = $('#').val();
		// precioS= $('#').val();
		// soporteIntermedio = $('#').val();
		// precioSI= $('#').val();
		// Motor = $('#').val();
		// precioMOt= $('#').val();





