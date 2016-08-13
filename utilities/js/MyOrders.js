document.write('<script src="../utilities/js/Adicionales.js" type="text/javascript"></script>');
var jsonGLobal = null;

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
	        	//console.log(response);
	    	    Json = JSON.parse(response);		    	    
				$.each(Json, function(index, val) {
					var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
					var Ref ='<td style="text-align:center">'+val.REFERENCIAPEDIDO+'</td>'; 
					var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
					var Tot ='<td style="text-align:center">$ '+ConF(val.BRUTO)+'</td>';
					var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
					var addBtn = '<td style="text-align:center">'+Btn+'</td>';
					var detallePedido ="<tr>"+Cod+Ref+Fec+Tot+addBtn+"</tr>";
				  	$('#detallePedido').append(detallePedido);
				  	i++;				  
				});

				if(Json != null && Json != undefined){
					jsonGLobal = Json;
					//console.log(jsonGLobal);
				}
	 	    }
 		}); // final
}

// function CargarPedidos(codigo){
	
// 	var idcliente = codigo;
// 	//var nrodcto = $('#nro_documento').text();
// 		$.ajax({
// 	        data:  {opcion : 'CargarPedidos',
// 	        		idcliente:idcliente},

// 	        url:   '../control/control_myorders.php',
// 	        type:  'post',
	      
// 	        success:  function (response) {
// 	        	var i=1;
// 	    	    Json = JSON.parse(response);		    	    
// 				$.each(Json, function(index, val) {
// 					var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
// 					var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
// 					var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
// 					var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
// 					var addBtn = '<td style="text-align:center">'+Btn+'</td>';
// 					var detallePedido ="<tr>"+Cod+Fec+Tot+addBtn+"</tr>";
// 				  	$('#detallePedido').append(detallePedido);
// 				  	i++;				  
// 				});

// 				if(Json != null && Json != undefined){
// 					jsonGLobal = Json;
// 					//console.log(jsonGLobal);
// 				}
// 	 	    }
//  		}); // final
// }

function verDetalle(numDocumento){
	
	var nrodcto = numDocumento;
	//console.log(nrodcto);
	$.ajax({
        data:  {opcion : 'CargarProductos',
        		nrodcto: nrodcto},

        url:   '../control/control_myorders.php',
        type:  'post',
      
        success:  function (response) {

        	var i=1;

			$("#detalleProducto").empty(); 

    	    //console.log(response);
    	    Json = JSON.parse(response);	
    	    //console.log(JSON.stringify(Json));
			$.each(Json, function(index, val) {
				var Row ='<td style="text-align:center" id="td_itemProducto'+val.IDPRODUCTO+'">'+i+'</td>';
				var RName ='<td style="text-align:center" class="txt">'+val.NOMBRE+'</td>';
				var RCant ='<td style="text-align:center">'+parseInt(val.CANTIDAD).toFixed(0)+'</td>';
				var RAnch='<td style="text-align:center">'+val.ANCHO+'</td>';
				var RAlt='<td style="text-align:center">'+val.ALTO+'</td>';
				var RVal='<td style="text-align:center" id="Val'+i+'">'+ConF(val.VALORUNIT)+'</td>';
				var RCaracte='<td style="text-align:center" class="txt">'+val.NOTA+'</td>';
				var detalleProducto ="<tr id='tr_"+val.IDPRODUCTO+"'>"+Row+RName+RCant+RAnch+RAlt+RVal+RCaracte+"</tr>";
				
			  	$('#detalleProducto').append(detalleProducto);
			  	i++;
		  
			});

			$('#modalVerDetalle').modal({backdrop: 'static', keyboard: false});
 	    },
 	    Done:function(){}
 	}); // final
}



function paonde(val){
	if (!isNaN(val)) {
		BuscarProducto();
	}else{
		BuscarProductoReferencia();
	}

}





function BuscarProducto(){
    
    var i=1;
	var codBuscar = $('input:text[name=incodigoPedido]').val();//$('#codigoPedido').val();
	//alert(codBuscar);
//	console.log("Global");
//	console.log(jsonGLobal);
	if(codBuscar != "" && jsonGLobal != null && jsonGLobal != undefined){
		$.each(jsonGLobal, function(index, val) {
			var contNrodcto = val.NRODCTO;
	//		console.log(val);
			if(contNrodcto.includes(codBuscar)){
			  	if(i == 1){
					$("#detallePedido").empty(); 
			  	}
				var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
				var Ref ='<td style="text-align:center">'+val.REFERENCIAPEDIDO+'</td>'; 
				var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
				var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
				var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
				var addBtn = '<td style="text-align:center">'+Btn+'</td>';
				var detallePedido ="<tr>"+Cod+Ref+Fec+Tot+addBtn+"</tr>";
			  	$('#detallePedido').append(detallePedido);
			  	i++;
			}
		});
	}else if(codBuscar == ""){
		if(jsonGLobal != null && jsonGLobal != undefined){
			$("#detallePedido").empty(); 
			$.each(jsonGLobal, function(index, val) {
				var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
				var Ref ='<td style="text-align:center">'+val.REFERENCIAPEDIDO+'</td>'; 
				var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
				var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
				var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
				var addBtn = '<td style="text-align:center">'+Btn+'</td>';
				var detallePedido ="<tr>"+Cod+Ref+Fec+Tot+addBtn+"</tr>";
			  	$('#detallePedido').append(detallePedido);
			  	i++;
			});		
		}
	}
}


// function BuscarProducto(){
    
//     var i=1;
// 	var codBuscar = $('input:text[name=incodigoPedido]').val();//$('#codigoPedido').val();
// 	//alert(codBuscar);
// 	console.log("Global");
// 	console.log(jsonGLobal);
// 	if(codBuscar != "" && jsonGLobal != null && jsonGLobal != undefined){
// 		$.each(jsonGLobal, function(index, val) {
// 			var contNrodcto = val.NRODCTO;
// 			console.log(val);
// 			if(contNrodcto.includes(codBuscar)){
// 			  	if(i == 1){
// 					$("#detallePedido").empty(); 
// 			  	}
// 				var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
// 				var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
// 				var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
// 				var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
// 				var addBtn = '<td style="text-align:center">'+Btn+'</td>';
// 				var detallePedido ="<tr>"+Cod+Fec+Tot+addBtn+"</tr>";
// 			  	$('#detallePedido').append(detallePedido);
// 			  	i++;
// 			}
// 		});
// 	}else if(codBuscar == ""){
// 		if(jsonGLobal != null && jsonGLobal != undefined){
// 			$("#detallePedido").empty(); 
// 			$.each(jsonGLobal, function(index, val) {
// 				var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
// 				var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
// 				var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
// 				var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
// 				var addBtn = '<td style="text-align:center">'+Btn+'</td>';
// 				var detallePedido ="<tr>"+Cod+Fec+Tot+addBtn+"</tr>";
// 			  	$('#detallePedido').append(detallePedido);
// 			  	i++;
// 			});		
// 		}
// 	}
// }



function OnChangeCodigoPedido(){

	var contCodPedido = $('input:text[name=incodigoPedido]').val();
	$("#detallePedido").empty(); 

	if(contCodPedido =="" && jsonGLobal != null && jsonGLobal != undefined){
		$.each(jsonGLobal, function(index, val) {
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
}





function BuscarProductoReferencia(){
    
    var i=1;
	var stringReferencia = $('input:text[name=incodigoPedido]').val();
	
	if(stringReferencia != "" && jsonGLobal != null && jsonGLobal != undefined){
		$.each(jsonGLobal, function(index, val) {
			var nombReferencia = val.REFERENCIAPEDIDO;
			
			if(nombReferencia.includes(stringReferencia)){
			  	if(i == 1){
					$("#detallePedido").empty(); 
			  	}
				var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
				var Ref ='<td style="text-align:center">'+val.REFERENCIAPEDIDO+'</td>'; 
				var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
				var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
				var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
				var addBtn = '<td style="text-align:center">'+Btn+'</td>';
				var detallePedido ="<tr>"+Cod+Ref+Fec+Tot+addBtn+"</tr>";
			  	$('#detallePedido').append(detallePedido);
			  	i++;
			}
		});
	}else if(stringReferencia == ""){
		if(jsonGLobal != null && jsonGLobal != undefined){
			$("#detallePedido").empty(); 
			$.each(jsonGLobal, function(index, val) {
				var Cod ='<td style="text-align:center">'+val.NRODCTO+'</td>';
				var Ref ='<td style="text-align:center">'+val.REFERENCIAPEDIDO+'</td>'; 
				var Fec ='<td style="text-align:center">'+val.FECHA+'</td>';
				var Tot ='<td style="text-align:center">'+val.BRUTO+'</td>';
				var Btn = '<button id="btnVer'+val.NRODCTO+'" class="btn btn-danger" title="Ver" onclick="verDetalle('+val.NRODCTO+')">Ver</button>'; //<span class="glyphicon glyphicon-remove"></span>  -- 
				var addBtn = '<td style="text-align:center">'+Btn+'</td>';
				var detallePedido ="<tr>"+Cod+Ref+Fec+Tot+addBtn+"</tr>";
			  	$('#detallePedido').append(detallePedido);
			  	i++;
			});		
		}
	}
	
}
