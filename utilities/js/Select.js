
document.write('<script src="../utilities/js/Adicionales.js" type="text/javascript"></script>');
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
			//console.log('la tela es '+ tela);
			var tipo =$('#producto_tipo_tela').val();
		//	console.log('el tipó ' + tipo);
		//	console.log('la tela '+ tela);
		    $.ajax({
		        data:  {tipo: tipo, tela: tela, opcion: 4},
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
	function casetera(){

		var tipo =$('#producto_tipo').val();
		var presentacion =$('#producto_tipo_presentacion').val();

		console.log(tipo +'  -  '+presentacion);;
				
				if(tipo=='ENROLLABLE'){
					console.log('tipo');
					if(presentacion=='PREMIUM'){
						$('#dap_casetera').show();
					}else{
						$('#dap_casetera').hide();
					}
				}
	}



	function seleccionar_producto(){
		
		var tipoproducto = $('#producto_tipo').val();
		var presentacionproducto = $('#producto_tipo_presentacion').val();
		var tipoTelaProducto = $('#producto_tipo_tela').val();
		var telaproducto = $('#producto_tela').val();
		var color =$('#producto_tela_color').val();



		if(color=='SELECCIONE'){
			document.getElementById("datos_iniciales").style.display = "none";
		    document.getElementById("datos_adicionales").style.display = "none";
		    document.getElementById("datos_complementarios").style.display = "none";

		}else if (tipoproducto =='SHEER'){
				var alto = $('#producto_alto').val();
				var ancho = $('#producto_ancho').val();
			 $.ajax({
		        data:  {ancho:ancho,
						alto:alto,
						telaproducto: telaproducto,
		        		 opcion: 9},
		        url:   '../control/validar.php',
		        type:  'post',
		        success:  function (data) {
						Json =JSON.parse(data);
		//				console.log(Json.Precio);
						document.getElementById("datos_iniciales").style.display = "block";
		    			document.getElementById("datos_adicionales").style.display = "block";
		    			document.getElementById("datos_complementarios").style.display = "block";
	    				productoPrecio = Json.Precio;
	    				console.log(productoPrecio);
		    			$('#producto_precio_lista').html(ConF(productoPrecio));
		    			$('#producto_precio_db').html(ConF(productoPrecio));
		    			calcularValores();
		        }
			}); // final del ajaz

		}else {
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
		    			$('#producto_precio_lista').html(ConF(productoPrecio));
		    			$('#producto_precio_db').html(ConF(productoPrecio));
		    			calcularValores();
		        }
			}); // final del ajaz
		}// final del else
	}
	function calcularValores(){
		var tipo =$('#producto_tipo').val();
		var color  =$('#producto_tela_color').val();
		var telaproducto = $('#producto_tela').val();
		if(tipo=='SHEER'){
				var alto = $('#producto_alto').val();
				var ancho = $('#producto_ancho').val();
			 $.ajax({
		        data:  {ancho:ancho,
						alto:alto,
						telaproducto: telaproducto,
		        		 opcion: 9},
		        url:   '../control/validar.php',
		        type:  'post',
		        success:  function (data) {
						Json =JSON.parse(data);
	    				productoPrecio = Json.Precio;
		    			$('#producto_precio_lista').html(ConF(productoPrecio));
		    			$('#producto_precio_db').html(ConF(productoPrecio));
		    			
		    			
					   
						var productoCantidad = $('#producto_cantidad').val();
						var valproducto = productoCantidad * productoPrecio;
						$('#producto_precio_lista').text(ConF(productoPrecio));


						var prodDescDist = $('#producto_descuento_distribuidor').val();
						var prodDescAdi = $('#producto_descuento_adicional').val();

						var total_desc = parseInt(prodDescDist)+parseInt(prodDescAdi);
						var prodpreciodesc =valproducto - (valproducto *(total_desc /100));
						$('#producto_precio_descuento').html(ConF(prodpreciodesc));


						var daProductoSubtotal = prodpreciodesc;
						//console.log(daProductoSubtotal);
						var daProductoIva = daProductoSubtotal * (16 / 100);
						var daProductoTotal = daProductoSubtotal + daProductoIva;

						$('#da_producto_subtotal').html(ConF(daProductoSubtotal));
						$('#da_producto_iva').html(ConF(daProductoIva));
						$('#da_producto_total').html(ConF(daProductoTotal));


						var cliProductoSubtotal = valproducto;
						$('#da_cli_subtotal').html(ConF(cliProductoSubtotal));
						$('#da_cli_iva').html(ConF(cliProductoSubtotal*(16 /100)));
						$('#da_cli_total').html(ConF(cliProductoSubtotal + cliProductoSubtotal*(16 /100)));

						var nombreAdicional = $('#da_cover_light').val();
						//console.log('nombre adicional '+nombreAdicional);
						if(nombreAdicional != 'SELECCIONE'){
							cover_light();
							 setTimeout ("sumarAdicionales('#da_cover_light_precio');", 500); 
						}
						var nombrecenefa = $('#da_cenefa').val();
						//console.log('nombre adicional '+nombreAdicional);
						if(nombrecenefa != 'SELECCIONE'){
							cenefa();
							 setTimeout ("sumarAdicionales('#da_cenefa_precio');", 500); 
						}


		        }
			}); // final del ajaz


			
		}
		else{
			var productoPreciodb = SinF($('#producto_precio_db').text());
			var productoCantidad = $('#producto_cantidad').val();
			var ancho = $('#producto_ancho').val();
			var alto = $('#producto_alto').val();		
			var dimenciones = ancho * alto;
			var valproducto =(dimenciones * productoCantidad) * productoPreciodb;

			$('#producto_precio_lista').text(ConF(valproducto));

			var prodDescDist = $('#producto_descuento_distribuidor').val();
			var prodDescAdi = $('#producto_descuento_adicional').val();

			var total_desc = parseInt(prodDescDist)+parseInt(prodDescAdi);
			var prodpreciodesc =valproducto - (valproducto *(total_desc /100));
			$('#producto_precio_descuento').html(ConF(prodpreciodesc));


			var daProductoSubtotal = prodpreciodesc;
			//console.log(daProductoSubtotal);
			var daProductoIva = daProductoSubtotal * (16 / 100);
			var daProductoTotal = daProductoSubtotal + daProductoIva;

			$('#da_producto_subtotal').html(ConF(daProductoSubtotal));
			$('#da_producto_iva').html(ConF(daProductoIva));
			$('#da_producto_total').html(ConF(daProductoTotal));


			var cliProductoSubtotal = valproducto;
			$('#da_cli_subtotal').html(ConF(cliProductoSubtotal));
			$('#da_cli_iva').html(ConF(cliProductoSubtotal*(16 /100)));
			$('#da_cli_total').html(ConF(cliProductoSubtotal + cliProductoSubtotal*(16 /100)));

			var nombreAdicional = $('#da_cover_light').val();
			//console.log('nombre adicional '+nombreAdicional);
			if(nombreAdicional != 'SELECCIONE'){
				cover_light();
				 setTimeout ("sumarAdicionales('#da_cover_light_precio');", 500); 
			}
			var nombrecenefa = $('#da_cenefa').val();
			//console.log('nombre adicional '+nombreAdicional);
			if(nombrecenefa != 'SELECCIONE'){
				cenefa();
				 setTimeout ("sumarAdicionales('#da_cenefa_precio');", 500); 
			}

			}	

			

	}

	function sumarAdicionales(id){
		//valores antes de adicional;
		var subAnt = parseInt(SinF($('#da_producto_subtotal').text()));
		//datos del objeto
		var ValorAgregar=parseInt(SinF($(id).text()));
		//console.log(ValorAgregar);
		var subDes = subAnt+ValorAgregar;
		//console.log(subDes);
		var ivaDes =subDes * (16 / 100);
		//console.log(ivaDes);
		var TotalDes = subDes+ivaDes;
		//console.log(TotalDes);
		$('#da_producto_subtotal').html(ConF(subDes));
		$('#da_producto_iva').html(ConF(ivaDes));
		$('#da_producto_total').html(ConF(TotalDes));
		console.log('este es el id '+id);
		if(id=='#Motor_valor'){
			var sindesc=parseInt(SinF($('#Motor_valor_db').text()));
		}else if (id=='#da_cover_light_precio') {
			var sindesc=parseInt(SinF($('#h_cover_light_precio').text()));
		}else if (id=='#da_cenefa_precio') {
			var sindesc=parseInt(SinF($('#h_cenefa_precio').text()));
		}else if (id=='#da_perf_bol_precio') {
			var sindesc=parseInt(SinF($('#h_perf_bol_precio').text()));
		}

		var subcli = SinF($('#da_cli_subtotal').text());
		var totcli = subcli+sindesc;
		$('#da_cli_subtotal').html(ConF(totcli));
		$('#da_cli_iva').html(ConF(totcli*(16 /100)));
		$('#da_cli_total').html(ConF(totcli + totcli*(16 /100)));

	}


	function seleccionarTipoProducto(tipoProducto)
		{
		if (tipoProducto == "ENROLLABLE")
			{
				var presentacion = $('#producto_tipo_presentacion').val();
				document.getElementById("dap_junto_item").style.display = "none";
				document.getElementById("dap_mismo_cabezal").style.display = "none";
				document.getElementById("dap_telos").style.display = "none";
				document.getElementById("dap_apertura").style.display = "none";
				document.getElementById("dap_cenefa").style.display = "none";

				document.getElementById("dap_mando").style.display = "block";
				document.getElementById("dap_perfil").style.display = "block";
				document.getElementById("dap_direccion_tela").style.display = "block";
				document.getElementById("dap_sentido").style.display = "block";
				document.getElementById("dap_soporte_intermedio").style.display = "block";
				document.getElementById("dap_cover_light").style.display = "block";
				$('#instalacion').show();
				$('#sistema_motor').show();
				$('#dap_bolsillo').hide();
				$('#dap_bolsillo2').hide();

		

			}
			else if (tipoProducto == "SHEER")
			{
				document.getElementById("dap_perfil").style.display = "none";
				document.getElementById("dap_direccion_tela").style.display = "none";
				document.getElementById("dap_cover_light").style.display = "none";
				document.getElementById("dap_telos").style.display = "none";
				document.getElementById("dap_apertura").style.display = "none";
				document.getElementById("dap_sentido").style.display = "none";
				document.getElementById("dap_cenefa").style.display = "none";

				document.getElementById("dap_mando").style.display = "block";
				document.getElementById("dap_soporte_intermedio").style.display = "block";
				document.getElementById("dap_junto_item").style.display = "block";
				document.getElementById("dap_mismo_cabezal").style.display = "block";
				$('#instalacion').show();
				$('#sistema_motor').show();
				$('#dap_bolsillo').hide();
				$('#dap_bolsillo2').hide();
				$('#dap_casetera').show();
			}
			else if (tipoProducto == "PANEL JAPONES")
			{
				document.getElementById("dap_soporte_intermedio").style.display = "none";
				document.getElementById("dap_junto_item").style.display = "none";
				document.getElementById("dap_mismo_cabezal").style.display = "none";
				document.getElementById("dap_cover_light").style.display = "none";
				document.getElementById("dap_sentido").style.display = "none";

				document.getElementById("dap_perfil").style.display = "block";
				document.getElementById("dap_direccion_tela").style.display = "none";
				document.getElementById("dap_mando").style.display = "block";
				document.getElementById("dap_telos").style.display = "block";
				document.getElementById("dap_apertura").style.display = "block";
				document.getElementById("dap_cenefa").style.display = "block";
				$('#instalacion').show();
				$('#sistema_motor').show();
				$('#dap_bolsillo').hide();
				$('#dap_bolsillo2').hide();
				$('#dap_casetera').hide();
			}
			else if (tipoProducto=='TELOS') {
				document.getElementById("dap_soporte_intermedio").style.display = "none";
				document.getElementById("dap_junto_item").style.display = "none";
				document.getElementById("dap_mismo_cabezal").style.display = "none";
				document.getElementById("dap_cover_light").style.display = "none";
				document.getElementById("dap_sentido").style.display = "none";
				document.getElementById("dap_apertura").style.display = "none";
				document.getElementById("dap_cenefa").style.display = "none";
				document.getElementById("dap_direccion_tela").style.display = "none";
				document.getElementById("dap_mando").style.display = "none";
				$('#instalacion').hide();
				$('#sistema_motor').hide();
				$('#dap_bolsillo').show();
				$('#dap_bolsillo2').show();
				$('#dap_casetera').hide();


				document.getElementById("dap_perfil").style.display = "none";
				document.getElementById("dap_telos").style.display = "block";
				

				
			}
		}
		function llamar_descu(nombre){

		//	console.log('desde la funcion el nombre es ' +nombre);
			// var nombre="<?php echo $_SESSION['usuario_nombre']; ?> ";
			$.post("../control/control_propio.php",{ usuario_nombre:nombre }, function (data){
				var jsonResponse = JSON.parse(data);
			    $('#producto_descuento_distribuidor').val(parseInt(jsonResponse.Descu));
      //           $('#da_mando_descuento').val(parseInt(jsonResponse.Descu));  
      //           $('#da_perfil_descuento').val(parseInt(jsonResponse.Descu));
      //           $('#da_direccion_tela_descuento').val(parseInt(jsonResponse.Descu));
      //           $('#da_sentido_descuento').val(parseInt(jsonResponse.Descu));
  				// $('#da_soporte_intermedio_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_cover_light_descuento').val(parseInt(jsonResponse.Descu));
                // $('#da_junto_item_descuento').val(parseInt(jsonResponse.Descu));
                // $('#da_mismo_cabezal_descuento').val(parseInt(jsonResponse.Descu));
                $('#da_motor_desc').val(parseInt(jsonResponse.Descu));
                $('#da_cenefa_descuento').val(parseInt(jsonResponse.Descu));
   
             });
		}
		function Perfil(tipoProducto){
			var tipoproducto= tipoProducto;
			//console.log('tipo '+tipoProducto);
				if(tipoproducto=='SELECCIONE'){
					var select = document.getElementById("da_perfil");
							while(select.options.length > 0)
								{                
				    				select.remove(0);
				    			}
				    			var option = document.createElement('option');
								option.value = "SELECCIONE";
					    		option.text = "-- Seleccione --";
					    		select.add(option);
				}else{
					var presentacion = $('#producto_tipo_presentacion').val();
					if(presentacion == 'PREMIUM'){
						if(presentacion =='PREMIUM'){
							document.getElementById("dap_perfil").style.display = "none";
						}
					}else{
					    $.ajax({
					        data:  {tipoproducto: tipoproducto, opcion: 6},
					        url:   '../control/validar.php',
					        type:  'post',
					      
					        success:  function (response) {
									Json =JSON.parse(response);
									var select = document.getElementById("da_perfil");
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
										option.value = val.nombrePerfil;
						    			option.text = val.nombrePerfil;
						    			select.add(option);
									});

									
										 $('#da_bolsillo_perfil').prop('selectedIndex', 0);
										 $('#h_perf_bol_precio').text('0.00');
										 $('#da_perf_bol_precio').text('0.00');

									
									

					        }
						}); // final del ajaz
					}// final del else 
				}
				seleccionarTipoProducto(tipoproducto);
				Bolsillo(tipoProducto);
		}
		function Bolsillo(tipoProducto){
			var tipoproducto= tipoProducto;
		//	console.log('tipo '+tipoProducto);
				if(tipoproducto=='SELECCIONE'){
					var select = document.getElementById("da_bolsillo");
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
				        data:  {tipoproducto: tipoproducto, opcion: 6},
				        url:   '../control/validar.php',
				        type:  'post',
				      
				        success:  function (response) {
								Json =JSON.parse(response);
								var select = document.getElementById("da_bolsillo");
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
									option.value = val.nombrePerfil;
					    			option.text = val.nombrePerfil;
					    			select.add(option);
								});
								

				        }
					}); // final del ajaz
				}// final del else 
				seleccionarTipoProducto(tipoproducto)
		}
		function PerfilColor(nombreperfil){
			
			var nombreperfil = nombreperfil;
				if(nombreperfil=='SELECCIONE'){
					var select = document.getElementById("da_perfil_color");
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
				        data:  {nombreperfil : nombreperfil,
				        		 opcion: 7},
				        url:   '../control/validar.php',
				        type:  'post',
				      
				        success:  function (response) {
								Json =JSON.parse(response);
								var select = document.getElementById("da_perfil_color");
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
									option.value = val.colorPerfil;
					    			option.text = val.colorPerfil;
					    			select.add(option);
								});
								

				        }
					}); // final del ajaz
				}// final del else 
				seleccionarTipoProducto(tipoproducto)
		}
		function sistema(sistema){
			if (sistema=='MANUAL'){
				document.getElementById("panel_sistema").style.display = "none";

			}else if (sistema =='MOTORIZADO') {
				document.getElementById("panel_sistema").style.display = "block";
				
			}else if (sistema=='SELECCIONE') {

				
			}


		}

		function coloraccesorio(tipo){
			if (tipo=='SELECCION') {

			}else{
				$.ajax({
					type:'post',
					url:'../control/validar.php',
					data:{opcion: 8, tipo:tipo},
					success: function (data){
						//console.log(data);
						Json = JSON.parse(data);
						var select = document.getElementById("da_color_acceso");
								while(select.options.length > 0)
								{                
				    				select.remove(0);
				    			}
				    			var option = document.createElement('option');
								option.value = "SELECCIONE";
					    		option.text = "-- Seleccione --";
					    		select.add(option);
						$.each(Json, function(index, val){
						//	console.log(val);
						var option = document.createElement('option');
								option.value = val.COLOR;
				    			option.text = val.COLOR;
				    			select.add(option);
						});
					}	
				});
			}
		}

