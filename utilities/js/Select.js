

	function validar_tipo_producto(tipoproducto){

				if(tipoproducto=='SELECCIONE'){
					var select = document.getElementById("producto_tipo_presentacion");
								while(select.options.length > 0)
								{                
				    				select.remove(0);
				    			}
				    			var option = document.createElement('option');
								option.value = "SELECCIONE";
					    		option.text = "-- Seleccione --";
					    		select.add(option);

				}else{
				    $.ajax({
				        data:  {tipoproducto: tipoproducto, opcion: 1},
				        url:   '../control/validar.php',
				        type:  'post',
				      
				        success:  function (response) {
								Json =JSON.parse(response);
								var select = document.getElementById("producto_tipo_presentacion");
								while(select.options.length > 0)
								{                
				    				select.remove(0);
				    			}
				    			var option = document.createElement('option');
								option.value = "SELECCIONE";
					    		option.text = "-- Seleccione --";
					    		select.add(option);
								$.each(Json, function(index, val) {
							 //   	console.log(val.tipoPresentacionProducto);
							    	var option = document.createElement('option');
									option.value = val.tipoPresentacionProducto;
					    			option.text = val.tipoPresentacionProducto;
					    			select.add(option);
								});
								

				        }
					}); // final del ajaz
				}// final del else 
				seleccionarTipoProducto(tipoproducto);
	}
	function validar_tipo_presentacion(presentacionproducto){

		if(tipoproducto=='SELECCIONE'){
			var select = document.getElementById("producto_tipo_tela");
			while(select.options.length > 0)
			{                
				select.remove(0);
			}
			var option = document.createElement('option');
			option.value = "SELECCIONE";
			option.text = "-- Seleccione --";
			select.add(option);

		}else{
			var tipoproducto =$('#producto_tipo').val();
			$.ajax({
		        data:  {presentacionproducto: presentacionproducto, tipoproducto: tipoproducto, opcion: 2},
		        url:   '../control/validar.php',
		        type:  'post',
		      
		        success:  function (response) {
						Json =JSON.parse(response);
						var select = document.getElementById("producto_tipo_tela");
						while(select.options.length > 0)
						{                
		    				select.remove(0);
		    			}
		    			var option = document.createElement('option');
						option.value = "SELECCIONE";
			    		option.text = "-- Seleccione --";
			    		select.add(option);
						$.each(Json, function(index, val) {
//					    	console.log(val.tipoTelaProducto);
					    	var option = document.createElement('option');
							option.value = val.tipoTelaProducto;
			    			option.text = val.tipoTelaProducto;
			    			select.add(option);
						});
						

		        }
			}); // final del ajaz
		}// final del else 
	}
	function validar_tipo_tela(telaproducto){

		if(tipoproducto=='SELECCIONE'){
			var select = document.getElementById("producto_tela");
			while(select.options.length > 0)
			{                
				select.remove(0);
			}
			var option = document.createElement('option');
			option.value = "SELECCIONE";
			option.text = "-- Seleccione --";
			select.add(option);

		}else{
			var tipoproducto =$('#producto_tipo').val();
			var presentacionproducto=$('#producto_tipo_presentacion').val();
		    $.ajax({
		        data:  {presentacionproducto: presentacionproducto, 
		        		tipoproducto: tipoproducto, 
		        		telaproducto:telaproducto,  opcion: 3},
		        url:   '../control/validar.php',
		        type:  'post',
		      
		        success:  function (response) {
						Json =JSON.parse(response);
						var select = document.getElementById("producto_tela");
						while(select.options.length > 0)
						{                
		    				select.remove(0);
		    			}
		    			var option = document.createElement('option');
						option.value = "SELECCIONE";
			    		option.text = "-- Seleccione --";
			    		select.add(option);
						$.each(Json, function(index, val) {
					    //	console.log(val.telaProducto);
					    	var option = document.createElement('option');
							option.value = val.telaProducto;
			    			option.text = val.telaProducto;
			    			select.add(option);
						});
						

		        }
			}); // final del ajaz
		}// final del else 
	}
	function validar_color_tela(tela){
		if(tela=='SELECCIONE'){
			var select = document.getElementById("producto_tela_color");
			while(select.options.length > 0)
			{                
				select.remove(0);
			}
			var option = document.createElement('option');
			option.value = "SELECCIONE";
			option.text = "-- Seleccione --";
			select.add(option);

		}else{
		    $.ajax({
		        data:  {tela: tela, opcion: 4},
		        url:   '../control/validar.php',
		        type:  'post',
		      
		        success:  function (response) {
						Json =JSON.parse(response);
						var select = document.getElementById("producto_tela_color");
						while(select.options.length > 0)
						{                
		    				select.remove(0);
		    			}
		    			var option = document.createElement('option');
						option.value = "SELECCIONE";
			    		option.text = "-- Seleccione --";
			    		select.add(option);
						$.each(Json, function(index, val) {
					    //	console.log(val.colorTela);
					    	var option = document.createElement('option');
							option.value = val.colorTela;
			    			option.text = val.colorTela;
			    			select.add(option);
						});
						//console.log('salio del ciclo each');

		        }
			}); // final del ajaz
		}// final del else 
	}
	function seleccionar_producto(color){
		var tipoproducto = $('#producto_tipo').val();
		var presentacionproducto = $('#producto_tipo_presentacion').val();
		var tipoTelaProducto = $('#producto_tipo_tela').val();
		var telaproducto = $('#producto_tela').val();
		

		if(color=='SELECCIONE'){
			document.getElementById("datos_iniciales").style.display = "none";
		    document.getElementById("datos_adicionales").style.display = "none";
		    document.getElementById("datos_complementarios").style.display = "none";

		}else{
		    $.ajax({
		        data:  {tipoproducto: tipoproducto,
		        		presentacionproducto: presentacionproducto,
						tipoTelaProducto: tipoTelaProducto,
						telaproducto: telaproducto,
		        		 opcion: 5},
		        url:   '../control/validar.php',
		        type:  'post',
		      
		        success:  function (response) {
						Json =JSON.parse(response);
						document.getElementById("datos_iniciales").style.display = "block";
		    			document.getElementById("datos_adicionales").style.display = "block";
		    			document.getElementById("datos_complementarios").style.display = "block";
	    				productoPrecio = Json.Precio;
		    			$('#producto_precio_lista').html(parseInt(productoPrecio));
		    			$('#producto_precio_db').html(parseInt(productoPrecio));
		    			calcularValores();


		        }
			}); // final del ajaz
		}// final del else
	}
	function calcularValores(){
		//DATOS INICIALES
		//console.log('ingreso a la funcion valores');
		var productoPrecioL = $('#producto_precio_lista').text();
		var productoCantidad = $('#producto_cantidad').val();
		//console.log(productoPrecioL+'  -  '+ productoCantidad);
		var productoPrecioCantidad = productoPrecioL * productoCantidad;
		//console.log(productoPrecioCantidad);
		var productoDescuentoDistribuidor = $('#producto_descuento_distribuidor').val();
		var productoDescuentoAdicional = $('#producto_descuento_adicional').val();
	
		var ancho = $('#producto_ancho').val();
		var alto = $('#producto_alto').val();


		var productoPrecioDescuento = productoPrecioL - (productoPrecioL * (productoDescuentoDistribuidor / 100)) - (productoPrecioL * (productoDescuentoAdicional / 100));
		if (productoPrecioDescuento < 0) {
				productoPrecioDescuento = 0;
			}
		$('#producto_precio_descuento').html(productoPrecioDescuento);
		//console.log(productoPrecioDescuento);
		
		var dimenciones = ancho * alto;
		productoCantidad = productoCantidad *dimenciones;

		var daProductoSubtotal = productoPrecioDescuento * productoCantidad;
		//console.log(daProductoSubtotal);
		var daProductoIva = daProductoSubtotal * (16 / 100);
		var daProductoTotal = daProductoSubtotal + daProductoIva;
		$('#da_producto_subtotal').html(daProductoSubtotal);
		$('#da_producto_iva').html(parseInt(daProductoIva));
		$('#da_producto_total').html(daProductoTotal);

	}

	function sumarAdicionales(id){
		//valores antes de adicional;
		var subAnt = parseInt($('#da_producto_subtotal').text());

		//datos del objeto
		var ValorAgregar=parseInt($(id).text());
		console.log(ValorAgregar);
		var subDes = subAnt+ValorAgregar;
		console.log(subDes);
		var ivaDes =subDes * (16 / 100);
		console.log(ivaDes);
		var TotalDes = subDes+ivaDes;
		console.log(TotalDes);
		$('#da_producto_subtotal').html(subDes);
		$('#da_producto_iva').html(parseInt(ivaDes));
		$('#da_producto_total').html(TotalDes);

	}


	function seleccionarTipoProducto(tipoProducto)
		{
		if (tipoProducto == "ENROLLABLE")
			{
				document.getElementById("dap_junto_item").style.display = "none";
				document.getElementById("dap_mismo_cabezal").style.display = "none";

				document.getElementById("dap_mando").style.display = "block";
				document.getElementById("dap_perfil").style.display = "block";
				document.getElementById("dap_direccion_tela").style.display = "block";
				document.getElementById("dap_sentido").style.display = "block";
				document.getElementById("dap_soporte_intermedio").style.display = "block";
				document.getElementById("dap_cover_light").style.display = "block";

			}
			else if (tipoProducto == "SHEER")
			{
				document.getElementById("dap_perfil").style.display = "none";
				document.getElementById("dap_direccion_tela").style.display = "none";
				document.getElementById("dap_cover_light").style.display = "none";

				document.getElementById("dap_mando").style.display = "block";
				document.getElementById("dap_sentido").style.display = "block";
				document.getElementById("dap_soporte_intermedio").style.display = "block";
				document.getElementById("dap_junto_item").style.display = "block";
				document.getElementById("dap_mismo_cabezal").style.display = "block";
			}
		}
		function llamar_descu(nombre){

		//	console.log('desde la funcion el nombre es ' +nombre);
			// var nombre="<?php echo $_SESSION['usuario_nombre']; ?> ";
			$.post("../control/control_propio.php",{ usuario_nombre:nombre }, function (data){
				var jsonResponse = JSON.parse(data);
			    $('#producto_descuento_distribuidor').val(parseInt(jsonResponse.Descu));
                $('#da_mando_descuento').val(parseInt(jsonResponse.Descu));  
                $('#da_perfil_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_direccion_tela_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_sentido_descuento').val(parseInt(jsonResponse.Descu));
  				$('#da_soporte_intermedio_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_cover_light_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_junto_item_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_mismo_cabezal_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_motor_desc').val(parseInt(jsonResponse.Descu));
   
             });
		}