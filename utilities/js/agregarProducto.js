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
		 if(validar()){
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
		 }else{
		 $('#modalError').modal({backdrop: 'static', keyboard: false});
		
		 }

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

function validar(){
		var passed=0;
		var tipo =$('#producto_tipo').val();
		var presentacion =$('#producto_tipo_presentacion').val();
		var tTela =$('#producto_tipo_tela').val();
		var tela =$('#producto_tela').val();
		var color =$('#producto_tela_color').val();

		if(tipo == 'SELECCIONE' || presentacion == 'SELECCIONE' || tTela == 'SELECCIONE' || tela == 'SELECCIONE' || color == 'SELECCIONE')
		{

			 $('#modalError').modal({backdrop: 'static', keyboard: false});
			 document.getElementById("alert").style.display = "block";
		}
		else
		{
			 document.getElementById("alert").style.display = "none";
			 passed++;
		}

		var cantidad=$('#producto_cantidad').val();
		var ancho =$('#producto_ancho').val();
		var alto =$('#producto_alto').val();
		if(cantidad <= 0 || ancho <= 0 || alto <= 0){
			 $('#modalError').modal({backdrop: 'static', keyboard: false});
			 document.getElementById("alert2").style.display = "block";
		}
		else{
			 document.getElementById("alert2").style.display = "none";
			 passed++
		}

		var perfil =$('#da_perfil').val();
		var color =$('#da_perfil_color').val();
		var sentido =$('#da_direccion_tela').val();
		var mando =$('#da_mando').val();
		var sistema =$('#da_motor').val();
		if(perfil == 'SELECCIONE' || color == 'SELECCIONE' || sentido == 'SELECCIONE' || mando == 'SELECCIONE' || sistema == 'SELECCIONE')
		{

			 $('#modalError').modal({backdrop: 'static', keyboard: false});
			 document.getElementById("alert3").style.display = "block";
		}
		else
		{
			 document.getElementById("alert3").style.display = "none";
			 passed++;
		}
		if (passed == 3) { return true;}

}
function limpiarCampos(){
		document.getElementById("datos_iniciales").style.display = "none";
	    document.getElementById("datos_adicionales").style.display = "none";
	    document.getElementById("datos_complementarios").style.display = "none";
	    campos =[
	    	'producto_tipo_presentacion',
	    	'producto_tipo_tela',
	    	'producto_tela',
	    	'producto_tela_color',
	    	'da_perfil',
	    	'da_perfil_color',
	    	'da_direccion_tela',
	    	'da_mando',
	    	'da_motor'
	    ];

	    $.each(campos, function(index, val){
	    	var select = document.getElementById(val);
	    	while(select.options.length > 0)
			{                
				select.remove(0);
			}
			var option = document.createElement('option');
			option.value = "SELECCIONE";
			option.text = "-- Seleccione --";
			select.add(option);
	    });
	    $('#producto_tipo').prop('selectedIndex', 0);
	    $('#da_motor_tipo').prop('selectedIndex', 0);
	    $('#producto_cantidad').val(1);
		$('#producto_ancho').val(1);
		$('#producto_alto').val(1);
		$('#Motor_valor_db').text(0);
		$('#Motor_valor').text(0);



	    

}





