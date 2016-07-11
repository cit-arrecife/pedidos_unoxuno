function cargarproductos(){
		//$('#detalleUsuario tr').each(function(){ $(this).remove();})
		$('#detalleUsuario').empty();
	$.ajax({
			type :'post',
			url : '../controller/controller_producto.php',
			data :{opcion: 1},
			success: function(data){
			//	console.log(data);
				Json = JSON.parse(data);
				$.each(Json, function(index, val){
					var id = '<td style="text-align:center; display:none" width="1%">'+val.ID+'</td>';
					var prod ='<td style="text-align:center;" width="20%">'+val.PROD+'</td>';
	                var pres  ='<td style="text-align:center;" width="20%">'+val.PRES+'</td>';
	                var tipo = '<td style="text-align:center;" width="20%">'+val.TIPO+'</td>';
	                var tela = '<td style="text-align:center;" width="20%">'+val.TELA+'</td>';
	                var precio = '<td style="text-align:center;" width="20%">'+val.PRECIO+'</td>';
	                var boton ='<button id="btnVer'+val.ID+'" class="btn btn-danger" title="Ver" onclick="verdetalle('+val.ID+')">Ver</button>';
	                var addBtn = '<td style="text-align:center">'+boton+'</td>';
	                var total = '<tr class="lista" id="tr_'+val.ID+'">'+id+prod+pres+tipo+tela+precio+addBtn+'</tr>';
	                scroll();
	                $('#detalleUsuario').append(total);
				});
			}	
		});

}
function scroll(){
	var alto= $('#productoContent').height();
	console.log('el widht es '+ alto );
	if (alto > 379) {
		$('#productoContent').addClass('Scroller');

	}else{
		$('#productoContent').removeClass('Scroller');		
	}

}

function nuevoproducto (){$('#nuevoproducto').modal({backdrop: 'static', keyboard: false});}

function editarproducto(){
	$( "#Uprod" ).prop( "disabled", false );
	$( "#Upres" ).prop( "disabled", false );
	$( "#Utipo" ).prop( "disabled", false );
	$( "#Utela" ).prop( "disabled", false );
	$( "#Uprecio" ).prop( "disabled", false );
}
function block (){
	$( "#Uprod" ).prop( "disabled", true );
	$( "#Upres" ).prop( "disabled", true );
	$( "#Utipo" ).prop( "disabled", true );
	$( "#Utela" ).prop( "disabled", true );
	$( "#Uprecio" ).prop( "disabled", true );
}
function GuardarNuevoproducto(){
	
	var mensaje;
	var prod = $( "#Nprod" ).val();
	var pres = $( "#Npres" ).val();
	var tipo = $( "#Ntipo" ).val();
	var tela = $( "#Ntela" ).val();
	var precio = $( "#Nprecio" ).val();

	if(prod != 'ENROLLABLE' && prod != 'PANEL JAPONES' && prod !='SHEER'){
		console.log('tipo no apto');
		mensaje = 'Tipo de Producto Invalido';

	}else if(pres=='' || tipo =='' || tela =='' || precio =='')
	{ mensaje = 'Debe llenar todos los campos';}
	else if (precio > 0) {
			$('#validacion').html('');
			console.log('llego al ajazx');
			$.ajax({
				type:'post',
				url:'../controller/controller_producto.php',
				data: { opcion: 2,
						prod:prod,
						pres:pres,
						tipo:tipo,
						tela:tela,
						precio:precio},
				success: function (data){
					alert(data);
					$('#nuevoproducto').modal('hide');
					cargarproductos();
					limpiarform();
				}
			});
		}else{mensaje='El precio debe ser mayor a 0';	}

	$('#validacionA').html(mensaje);

}

function verdetalle (id){
	$.ajax({
		type:'post',
		url:'../controller/controller_producto.php',
		data: { opcion: 3,
				id:id
				},
		success : function(data){
			//console.log(data);
			Json = JSON.parse(data);
			$.each(Json, function(index, val){
				$( "#Uid" ).val(val.ID);
				$( "#Uprod" ).val(val.PROD);
				$( "#Upres" ).val(val.PRES);
				$( "#Utipo" ).val(val.TIPO);
				$( "#Utela" ).val(val.TELA);
				$( "#Uprecio" ).val(val.PRECIO);
				var save ='<button type="button" class="btn" onclick="Actualizar('+val.ID+')">Guardar</button>';
				var del="<button type='button' class='btn' onclick='eliminarUsuario("+val.ID+")'>Eliminar</button>";
				var edit ='<button type="button" class="btn" onclick="editarproducto();" >Editar</button>';
				$( "#modalbtn" ).html(edit+save+del);
				$( "#titulomodal" ).html('Detalles del Producto ');
			});
			$('#modalusuario').modal({backdrop: 'static', keyboard: false});
		}
	});
}
function Actualizar(id){
	var mensaje;
	var prod = $( "#Uprod" ).val();
	var pres = $( "#Upres" ).val();
	var tipo = $( "#Utipo" ).val();
	var tela = $( "#Utela" ).val();
	var precio = $( "#Uprecio" ).val();
	

	if(prod != 'ENROLLABLE' && prod != 'PANEL JAPONES' && prod !='SHEER'){
			mensaje = 'Tipo de Producto Invalido';
		}else if(pres=='' || tipo =='' || tela =='' || precio =='')
		{ mensaje = 'Debe llenar todos los campos';}
		else if (precio > 0) {
			$('#validacion').html('');		
			$.ajax({
				type:'post',
				url:'../controller/controller_producto.php',
				data: { opcion: 4,
						id:id,
						prod:prod,
						pres:pres,
						tipo:tipo,
						tela:tela,
						precio:precio},
				success: function (data){
					alert(data);
					$('#modalusuario').modal('hide');
					cargarproductos();
				}
			});
		}else{mensaje='El precio debe ser mayor a 0';	}
	$('#validacion').html(mensaje);
}
function eliminarUsuario(id){
	var prod = $( "#Uprod" ).val();
	var pres = $( "#Upres" ).val();
	var tipo = $( "#Utipo" ).val();
	var tela = $( "#Utela" ).val();
	var cancel ='<button type="button" class="btn" data-dismiss="modal">Cancelar</button>';
	var del='<button type="button" class="btn" onclick="Eliminar('+id+')">Eliminar</button>';

	$('#oktitle').html('Se va a eliminar el Producto '+ prod+' - '+pres+' - '+tipo+' - '+tela);
	$('#okbtn').html(del+cancel);
	$('#modalusuario').modal('hide');
	$('#modalok').modal({backdrop: 'static', keyboard: false});
}
function Eliminar(id){
	$.ajax({
				type:'post',
				url:'../controller/controller_producto.php',
				data: { opcion: 5,
						id:id,},
				success: function (data){
					$('#modalusuario').modal('hide');
					$('#modalok').modal('hide');
					cargarproductos();
					scroll();
				}
			});
}
function limpiarform(){
	 $( "#Nprod" ).val('');
	 $( "#Npres" ).val('');
	 $( "#Ntipo" ).val('');
	 $( "#Ntela" ).val('');
	 $( "#Nprecio" ).val('');
}