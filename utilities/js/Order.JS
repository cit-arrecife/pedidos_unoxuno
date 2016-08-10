document.write('<script src="../utilities/js/Adicionales.js" type="text/javascript"></script>');
function CargarEncabezado(codigo){

	var idcliente = codigo;
	//console.log('ok jb');
		$.ajax({
	        data:  {opcion : 'CargarEncabezado',
	        		idcliente:idcliente	},
	        url:   '../control/control_mostrar.php',
	        type:  'post',
	      
	        success:  function (response) {
	        	Json = JSON.parse(response);	
			$("#ro_detalle_fecha").html(Json.FECHA);
			$('#nro_documento').text(Json.NRODCTO);
 			//console.log($('#nro_documento').text());
 			CargarProductos(idcliente);
				        }
		}); // final
}

	
	function CargarProductos(codigo){
	
		var rowItemProducto, rowNombreProducto, rowCantidadProducto, 
			rowAnchoProducto, rowAltoProducto, rowPrecioProducto,
			rowCaracteristicasProducto, rowDisponibilidadProducto, rowOpcionesProducto;
		var idcliente = codigo;
		var nrodcto = $('#nro_documento').text();
			$.ajax({
		        data:  {opcion : 'CargarProductos',
		        		idcliente:idcliente,
		        		nrodcto: nrodcto},

		        url:   '../control/control_mostrar.php',
		        type:  'post',
		      
		        success:  function (response) {


		        	var i=1;
		    	    Json = JSON.parse(response);	
		    	    
					$.each(Json, function(index, val) {
					var Row ='<td style="text-align:center" id="td_itemProducto'+val.IDPRODUCTO+'">'+i+'</td>';
					var RName ='<td style="text-align:center" class="txt">'+val.DETALLE+'</td>';
					var RCant ='<td style="text-align:center">'+val.CANTIDAD+'</td>';
					var RAnch='<td style="text-align:center">'+val.ANCHO+'</td>';
					var RAlt='<td style="text-align:center">'+val.ALTO+'</td>';
					var RVal='<td style="text-align:center" id="Val'+i+'">'+ConF(val.VALORUNIT)+'</td>';
					var RCaracte='<td style="text-align:center" class="txt">'+val.PRODUCTO+'</td>';
					// var Dispo='<td style="text-align:center"></td>';
					var buttonModificarP = '<button id="bModificarP'+val.IDPRODUCTO+'" class="btn btn-warning" title="Modificar" data-toggle="modal" data-target="#modal_modificar_producto'+val.IDPRODUCTO+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
					var buttonEliminarP = '<button id="bEliminarP'+val.IDPRODUCTO+'" class="btn btn-danger" title="Eliminar" onclick=eliminarRowProducto("'+val.IDPRODUCTO+'")><span class="glyphicon glyphicon-remove"></span></button>';
					var opciones = '<td style="text-align:center">'+buttonEliminarP+'</td>';
					var detalleProducto ="<tr id='tr_"+val.IDPRODUCTO+"'>"+Row+RName+RCant+RAnch+RAlt+RVal+RCaracte/*+Dispo*/+opciones+"</tr>";
				  	$('#detalleProducto').append(detalleProducto);
				  	i++;
				  
					});
					calcularValores();
		 	    }
		 	}); // final
	}

    	function calcularValores()
    	{
    	//	console.log('Calcula Valores');
    		var filas = document.getElementById("detalleProducto").rows.length;
    		var subtotal = 0; var iva = 0; var total = 0;
   			//var id = '#val'+(contadorFilas+1)
    		for (var contadorFilas = 0; contadorFilas < filas; contadorFilas++)
    		{
    			subtotal += SinF(document.getElementById("detalleProducto").rows[contadorFilas].cells[5].innerHTML, 10);
   			
    			iva = subtotal * 0.16;
    			total = subtotal + iva;
    		//	console.log('sub '+subtotal+' iva '+ iva + ' total '+ total);
	    	}

	    	$('#ro_subtotal_distribuidor').html(ConF(subtotal));
	    	$('#ro_iva_distribuidor').html(ConF(iva));
	    	$('#ro_total_distribuidor').html(ConF(total));

	    	
    	}

	function eliminarRowProducto(idproducto)
    	{
    		//$("#tr_"+idproducto).remove(); 
    		var nrodcto = $('#nro_documento').text();
    		$.ajax({
		        data:  {opcion : 'EliminarProductos',
		        		idproducto:idproducto,
		        		nrodcto: nrodcto},

		        url:   '../control/control_mostrar.php',
		        type:  'post',
		      
		        success:  function (response) {
		        	Json = JSON.parse(response);	
		        		if(Json.Susess){
		    				$("#tr_"+idproducto).remove();    		
		        		}
		 	    }
		 	}); // final
		 	 setTimeout ("calcularValores();", 500);
    		
    	}