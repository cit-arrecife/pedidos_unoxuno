

function CargarPedidos(codigo){
	
	var idcliente = codigo;
	//var nrodcto = $('#nro_documento').text();
		$.ajax({
	        data:  {opcion : 'CargarPedidos',
	        		idcliente:idcliente},

	        url:   '../control/control_myorders.php',
	        type:  'post',
	      
	        success:  function (response) {
	        	var i=1;
	    	    Json = JSON.parse(response);		    	    
				$.each(Json, function(index, val) {
					var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
					var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
					var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
					var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
					var addBtn = '<td style="text-align:center">'+Btn+'</td>';
					var detallePedido ="<tr>"+Cod+Fec+Tot+addBtn+"</tr>";
				  	$('#detallePedido').append(detallePedido);
				  	i++;				  
				});
	 	    }
 		}); // final
}

function verDetalle(numDocumento){
	
	var nrodcto = numDocumento;
	console.log(nrodcto);
	$.ajax({
        data:  {opcion : 'CargarProductos',
        		nrodcto: nrodcto},

        url:   '../control/control_myorders.php',
        type:  'post',
      
        success:  function (response) {

        	var i=1;
    	    console.log(response);
    	    //Json = JSON.parse(response);	
    	    Json = jQuery.parseJSON(response);
    	    console.log('un texto cualquiera' + Json);

			$.each(Json, function(index, val) {
			// var Row ='<td style="text-align:center" id="td_itemProducto'+val.IDPRODUCTO+'">'+i+'</td>';
			// var RName ='<td style="text-align:center" class="txt">'+val.DETALLE+'</td>';
			// var RCant ='<td style="text-align:center">'+val.CANTIDAD+'</td>';
			// var RAnch='<td style="text-align:center">'+val.ANCHO+'</td>';
			// var RAlt='<td style="text-align:center">'+val.ALTO+'</td>';
			// var RVal='<td style="text-align:center" id="Val'+i+'">'+val.VALORUNIT+'</td>';
			// var RCaracte='<td style="text-align:center" class="txt">'+val.PRODUCTO+'</td>';
			// var detalleProducto ="<tr id='tr_"+val.IDPRODUCTO+"'>"+Row+RName+RCant+RAnch+RAlt+RVal+RCaracte+"</tr>";
			
		 //  	$('#detalleProducto').append(detalleProducto);
		 //  	i++;
		  
			});

			$('#modalVerDetalle').modal({backdrop: 'static', keyboard: false});
 	    },
 	    Done:function(){alert("WTF???....")}
 	}); // final
}