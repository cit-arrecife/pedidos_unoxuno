			function consultarPrecio(nombre)
			{
				//console.log('func precio');
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


			function cover_light(){
				//console.log('inicio funcion');
				var tipoProducto = $('#producto_tipo').val();		
				var nombreAdicional = $('#da_cover_light').val();
				var precioAdicional = $('#precio_cover_light');
				
				var tablaAdicional = "cover_light";
				
				var hAdicional = $('#h_cover_light_precio');

					if (nombreAdicional == "SELECCIONE")
					{
					var value =SinF($('#da_cover_light_precio').text());
					//console.log(value);
						if(value != 0){
							restarAdicionales('#da_cover_light_precio');
						}
						hAdicional.html(0);
                    	cal();
					}
					else
					{
					$.ajax({
		    			type: "POST",
		    			url: "../control/control_adicional.php",
		    			data: { elegir: 0, tipoProducto: tipoProducto, nombreAdicional: nombreAdicional, tablaAdicional: tablaAdicional },
		    			success: function(data) {}
			    	}).done(function(data) {
			    		var jsonResponse = JSON.parse(data);
			    		var ancho =$('#producto_ancho').val();
	                    if (jsonResponse.Success == 1) {
	                    	var precioCover = jsonResponse.Precio * ancho;
	                    	hAdicional.html(ConF(precioCover));
	                    	cal();

	                    }
		    		});
					}
					
					
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
					// precioAdicional = $('#h_mando_precio').text();
					// descuentoAdicional = $('#da_mando_descuento').val();
					// precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					// $('#da_mando_precio').html(precioTotalAdicional);

					// precioAdicional = $('#h_perfil_precio').text();
					// descuentoAdicional = $('#da_perfil_descuento').val();
					// precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					// $('#da_perfil_precio').html(precioTotalAdicional);

					// precioAdicional = $('#h_direccion_tela_precio').text();
					// descuentoAdicional = $('#da_direccion_tela_descuento').val();
					// precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					// $('#da_direccion_tela_precio').html(precioTotalAdicional);

					// precioAdicional = $('#h_sentido_precio').text();
					// descuentoAdicional = $('#da_sentido_descuento').val();
					// precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					// $('#da_sentido_precio').html(precioTotalAdicional);

					// precioAdicional = $('#h_soporte_intermedio_precio').text();
					// descuentoAdicional = $('#da_soporte_intermedio_descuento').val();
					// precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					// $('#da_soporte_intermedio_precio').html(precioTotalAdicional);

					precioAdicional = SinF($('#h_cover_light_precio').text());
					descuentoAdicional = $('#da_cover_light_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_cover_light_precio').html(ConF(precioTotalAdicional));
					
					
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
				else if (tipoProducto == "PANEL JAPONES") {

					precioAdicional = SinF($('#h_cenefa_precio').text());
					descuentoAdicional = $('#da_cenefa_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_cenefa_precio').html(ConF(precioTotalAdicional));	
				}
				else if (tipoProducto == "TELOS") {
					precioAdicional = SinF($('#h_perf_bol_precio').text());
					descuentoAdicional = $('#da_cenefa_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_perf_bol_precio').html(ConF(precioTotalAdicional));		
				}
			}
			function Llenar_motor(tipomotor){
				if(tipomotor=='SELECCIONE'){
					var valor = SinF($('#Motor_valor').text());
					//console.log('valor '+valor);
					if(valor != 0){
						restarAdicionales('#Motor_valor');
						$('#Motor_valor').text(0);
						$('#Motor_valor_db').text(0);
						document.getElementById("Datos").style.display = "none";

					}

					var select = document.getElementById("da_motor");
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
			}
			function precio_motor(motor){
					if(motor != 'SELECCIONE' ){
					var valor = SinF($('#Motor_valor').text());
				//	console.log('valor '+valor);
					if(valor != 0){
						restarAdicionales('#Motor_valor');
					}
					//	console.log('resto adicionales');
						var tipoproducto =$('#producto_tipo').val();
						 $.ajax({
					        data:  {tipo_motor: motor,
					        		tipo_producto: tipoproducto,
					        		elegir: 1},
					        url:   '../control/control_propio.php',
					  	      type:  'post',
					    
					        success:  function (response) {
								Json =JSON.parse(response);
								$('#Motor_valor').text(ConF(Json.precioMotor));
								$('#Motor_valor_db').text(ConF(Json.precioMotor));
								descmotor();
								detalle_motor(motor);

						   }
						}); // final del ajaz
					
					}else{
						value =SinF($('#Motor_valor').text());
						if(value != 0){
							restarAdicionales('#Motor_valor');

						}
						$('#Motor_valor').text(0);
						$('#Motor_valor_db').text(0);
						descmotor();
						detalle_motor(motor);
					}
			}
			function detalle_motor(motor){
				if(motor != 'SELECCIONE' ){
					var tipoproducto =$('#producto_tipo').val();
					$.ajax({
				        data:  {tipo_motor: motor,
				        		tipo_producto: tipoproducto,
				        		elegir: 2},
				        url:   '../control/control_propio.php',
				        type:  'post',
				      
				        success:  function (response) {
				    		Json =JSON.parse(response);
							$.each(Json, function(index, val) {
							//	console.log('valor'+ val.activacion);
								$('#Activacion').text(val.activacion);
								$('#Voltaje').text(val.voltaje);
								$('#Tubo').text(val.tubo);
								$('#RPM').text(val.RPM);
								$('#Amperaje').text(val.amperaje);
								document.getElementById("Datos").style.display = "block";
							});
	  					}
					}); 
				}else{document.getElementById("Datos").style.display = "none";}
			}
			function descmotor(){
				//console.log('Entro a descmotor');
				var precioOriginal = SinF($('#Motor_valor_db').text());
				var descuento = $('#da_motor_desc').val();
				//console.log('Original '+ precioOriginal+ ' descuento '+ descuento);
				var precioConDescuento = precioOriginal - (precioOriginal * (descuento /100));
				//console.log(precioConDescuento);
				 $('#Motor_valor').text(conF(precioConDescuento));

			}
		function restarAdicionales(id){
		//valores antes de adicional;
		var subAnt = SinF($('#da_producto_subtotal').text());
		//datos del objeto
	//	alert(id);
		var ValorRestar=SinF($(id).text());
	//	console.log(ValorRestar);
		var subDes = subAnt-ValorRestar;
		//console.log(subDes);
		var ivaDes =subDes * (16 / 100);
		//console.log(ivaDes);
		var TotalDes = subDes+ivaDes;
		//console.log(TotalDes);
		$('#da_producto_subtotal').html(ConF(subDes));
		$('#da_producto_iva').html(ConF(ivaDes));
		$('#da_producto_total').html(ConF(TotalDes));

		if(id=='#Motor_valor'){
			var sindesc=SinF($('#Motor_valor_db').text());
		}else if (id=='#da_cover_light_precio') {
			var sindesc=SinF($('#h_cover_light_precio').text());
		}else if (id=='#da_cenefa_precio') {
			var sindesc=SinF($('#h_cenefa_precio').text());
		}else if (id=='#da_perf_bol_precio') {
			var sindesc=SinF($('#h_perf_bol_precio').text());
		}

		var subAntcli = SinF($('#da_cli_subtotal').text());

		$('#da_cli_subtotal').html(ConF(subAntcli-sindesc));
		$('#da_cli_iva').html(ConF(subAntcli-sindesc*(16 /100)));
		$('#da_cli_total').html(ConF(subAntcli-sindesc + sindesc*(16 /100)));


	}
	function cenefa(){
		var cenefa = 45000;
		var nombreAdicional = $('#da_cenefa').val();
		var hAdicional = $('#h_cenefa_precio');
		if (nombreAdicional == "SELECCIONE" || nombreAdicional == "ALUMINIO")
			{
			var value =$('#da_cenefa_precio').text();
			console.log(value);
				if(value != 0){
					restarAdicionales('#da_cenefa_precio');
				}
				hAdicional.html(0);
            	cal();
			}
			else
			{
				var ancho =$('#producto_ancho').val();
				var valCenefa = ancho *45000;
				hAdicional.html(ConF(valCenefa));
				cal();
			}
		

	}
	function perfil_telos(){
			var valor =$('#da_bolsillo_perfil').val();
			var telos= $('#da_telos').val();
			if(telos=='SELECCIONE'){
				var nrotelos =1;
			}else{
				var nrotelos = $('#da_telos').val();
			}

			var perfil_standar = 20000;
			var perfil_elite = 35000;
			var tipo = $('#producto_tipo_presentacion').val();
			var hAdicional = $('#h_perf_bol_precio');
			if (valor=='NO' || valor =='SELECCIONE') {
				var value =$('#da_perf_bol_precio').text();
				console.log(value);
				if(value != 0){
					restarAdicionales('#da_perf_bol_precio');
				}
				hAdicional.html(0);
            	cal();
			}else if (tipo =='ESTANDAR') {
				var ancho =$('#producto_ancho').val();
				var valCenefa = ancho *perfil_standar * nrotelos;
				hAdicional.html(valCenefa);
				cal();
			}else if (tipo=='ELITE') {
				var ancho =$('#producto_ancho').val();
				var valCenefa = ancho * perfil_elite * nrotelos;
				hAdicional.html(ConF(valCenefa));
				cal();
			}
		}

		function ConF(numero){
			console.log('entro a ConF');
			console.log(numero);
			numero = numero.toString();
			var n = 0;    	var x = 3;    	var s = '.';    	var c = ',';
		    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
		        num = parseInt(numero).toFixed(Math.max(0, ~~n));
			var formato = (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));	
			console.log(formato);
			return formato.toString();
		}
	    function SinF(valor){
	    	var valorpuntos =valor;
	    	var punto='si';
	    	var sinpuntos =valorpuntos.replace('.','')
	    	while (punto == 'si') {
	    		if(sinpuntos.indexOf('.') != -1){
					sinpuntos =sinpuntos.replace('.','')	
					alert(sinpuntos);
	    		}else  {
	    			punto='no';
	    		}
	    	}
	    	var valororiginal = parseInt(sinpuntos);
	    	return valororiginal;
    	}