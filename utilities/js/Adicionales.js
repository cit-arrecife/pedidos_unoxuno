			function consultarPrecio(nombre)
			{
				console.log('func precio');
				var tipoProducto = $('#producto_tipo').val();
				if(nombre == "da_mando")
				{
					var nombreAdicional = $('#da_mando').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_mando_precio").style.display = "none";
						//document.getElementById("da_mando_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_mando_precio").style.display = "block";
						//document.getElementById("da_mando_button").style.display = "block";
					}
					var precioAdicional = $('#da_mando_precio');
					var tablaAdicional = "mando";
					var hAdicional = $('#h_mando_precio');
				}
				else if(nombre == "da_perfil")
				{
					var nombreAdicional = $('#da_perfil').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_perfil');
					var tablaAdicional = "perfil";
					var hAdicional = $('#h_perfil_precio');
				}
				else if(nombre == "da_direccion_tela")
				{
					var nombreAdicional = $('#da_direccion_tela').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_direccion_tela');
					var tablaAdicional = "direccion_tela";
					var hAdicional = $('#h_direccion_tela_precio');
				}
				else if(nombre == "da_sentido")
				{
					var nombreAdicional = $('#da_sentido').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_sentido');
					var tablaAdicional = "sentido";
					var hAdicional = $('#h_sentido_precio');
				}
				else if(nombre == "da_soporte_intermedio")
				{
					var nombreAdicional = $('#da_soporte_intermedio').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_soporte_intermedio');
					var tablaAdicional = "soporte_intermedio";
					var hAdicional = $('#h_soporte_intermedio_precio');
				}
				else if(nombre == "da_cover_light")
				{
					var nombreAdicional = $('#da_cover_light').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_cover_light');
					var tablaAdicional = "cover_light";
					var hAdicional = $('#h_cover_light_precio');
				}
				else if(nombre == "da_junto_item")
				{
					var nombreAdicional = $('#da_junto_item').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_junto_item');
					var tablaAdicional = "junto_item";
					var hAdicional = $('#h_junto_item_precio');
				}
				else if(nombre == "da_mismo_cabezal")
				{
					var nombreAdicional = $('#da_mismo_cabezal').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_mismo_cabezal');
					var tablaAdicional = "mismo_cabezal";
					var hAdicional = $('#h_mismo_cabezal_precio');
				}

				$.ajax({
	    			type: "POST",
	    			url: "../control/control_adicional.php",
	    			data: { elegir: 0, tipoProducto: tipoProducto, nombreAdicional: nombreAdicional, tablaAdicional: tablaAdicional },
	    			success: function(data) {}
		    	}).done(function(data) {
		    		var jsonResponse = JSON.parse(data);
                    if (jsonResponse.Success == 1) {
                    	hAdicional.html(jsonResponse.Precio);
                    	cal();

                    }
	    		});
	    		
			}
			
			function validarDescuento(descuento)
			{
				if (document.getElementById(descuento).value < 0)
				{
					document.getElementById(descuento).value = 0;
				}
				else if (document.getElementById(descuento).value > 100)
				{
					document.getElementById(descuento).value = 100; 
				}
				else if (document.getElementById(descuento).value == "")
				{
					document.getElementById(descuento).value = 0;
				}
				cal();
			}
			function cal()
			{
				var precioAdicional, descuentoAdicional, precioTotalAdicional;
				var tipoProducto = $('#producto_tipo').val();
				
				if (tipoProducto == "ENROLLABLE")
				{
					precioAdicional = $('#h_mando_precio').text();
					descuentoAdicional = $('#da_mando_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_mando_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_perfil_precio').text();
					descuentoAdicional = $('#da_perfil_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_perfil_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_direccion_tela_precio').text();
					descuentoAdicional = $('#da_direccion_tela_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_direccion_tela_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_sentido_precio').text();
					descuentoAdicional = $('#da_sentido_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_sentido_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_soporte_intermedio_precio').text();
					descuentoAdicional = $('#da_soporte_intermedio_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_soporte_intermedio_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_cover_light_precio').text();
					descuentoAdicional = $('#da_cover_light_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_cover_light_precio').html(precioTotalAdicional);
				}
				else if (tipoProducto == "SHEER")
				{
					precioAdicional = $('#h_mando_precio').text();
					descuentoAdicional = $('#da_mando_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_mando_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_sentido_precio').text();
					descuentoAdicional = $('#da_sentido_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_sentido_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_soporte_intermedio_precio').text();
					descuentoAdicional = $('#da_soporte_intermedio_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_soporte_intermedio_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_junto_item_precio').text();
					descuentoAdicional = $('#da_junto_item_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_junto_item_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_mismo_cabezal_precio').text();
					descuentoAdicional = $('#da_mismo_cabezal_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_mismo_cabezal_precio').html(precioTotalAdicional);
				}
			}
			function Llenar_motor(tipomotor){
				var tipoproducto =$('#producto_tipo').val();
				 $.ajax({
			        data:  {tipo_motor: tipomotor,
			        		tipo_producto: tipoproducto,
			        		elegir: 0},
			        url:   '../control/control_propio.php',
			        type:  'post',
			      
			        success:  function (response) {
						Json =JSON.parse(response);
						var select = document.getElementById("da_motor");
						while(select.options.length > 0)
						{                
		    				select.remove(0);
		    			}
		    			var option = document.createElement('option');
						option.value = "SELECCIONE";
			    		option.text = "-- Seleccione --";
			    		select.add(option);
						$.each(Json, function(index, val) {
					    	console.log(val.descripcionMotor);
					    	var option = document.createElement('option');
							option.value = val.descripcionMotor;
			    			option.text = val.descripcionMotor;
			    			select.add(option);
						});
				   }
				}); // final del ajaz
			}
			function precio_motor(motor){
				var tipoproducto =$('#producto_tipo').val();
				 $.ajax({
			        data:  {tipo_motor: motor,
			        		tipo_producto: tipoproducto,
			        		elegir: 1},
			        url:   '../control/control_propio.php',
			        type:  'post',
			      
			        success:  function (response) {
						Json =JSON.parse(response);
						$('#Motor_valor').text(Json.precioMotor);
						$('#Motor_valor_db').text(Json.precioMotor);
						
						// $.each(Json, function(index, val) {
					 //    	console.log(val.descripcionMotor);
					 //    	var option = document.createElement('option');
						// 	option.value = val.descripcionMotor;
			   //  			option.text = val.descripcionMotor;
			   //  			select.add(option);
						// });
				   }
				}); // final del ajaz
			}