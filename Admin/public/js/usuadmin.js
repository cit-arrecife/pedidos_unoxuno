
function nuevousuario (){$('#nuevousuario').modal({backdrop: 'static', keyboard: false});}

function cargarusuarios(){
		$('#detalleUsuario tr').each(function(){ $(this).remove();})
	$.ajax({
			type :'post',
			url : '../controller/controller_usuadmin.php',
			data :{opcion: 1},
			success: function(data){
				//console.log(data);
				Json = JSON.parse(data);
				$.each(Json, function(index, val){
					var id = '<td style="text-align:center; display:none" width="1%">'+val.ID+'</td>';
					var nom ='<td style="text-align:center;" width="20%">'+val.NOMBRE+'</td>';
	                var cod  ='<td style="text-align:center;" width="20%">'+val.CODIGO+'</td>';
	                var pass = '<td style="text-align:center;" width="20%">'+val.PASSWORD+'</td>';
	                var boton ='<button id="btnVer'+val.ID+'" class="btn btn-danger" title="Ver" onclick="verdetalle('+val.ID+')">Ver</button>';
	                var addBtn = '<td style="text-align:center">'+boton+'</td>';
	                var total = '<tr class="lista" id="tr_'+val.ID+'">'+id+nom+cod+pass+addBtn+'</tr>';
	                $('#detalleUsuario').append(total);
				});
			}	
		});

}

function editarusuario (){
	$( "#Uname" ).prop( "disabled", false );
	$( "#Uuser" ).prop( "disabled", false );
	$( "#Upass" ).prop( "disabled", false );
	$( "#Upass2" ).prop( "disabled", false );
}
function block (){
	$( "#Uname" ).prop( "disabled", true );
	$( "#Uuser" ).prop( "disabled", true );
	$( "#Upass" ).prop( "disabled", true );
	$( "#Upass2" ).prop( "disabled", true );
}
function GuardarNuevoUsuario(){
	var mensaje;
	var name = $( "#NUname" ).val();
	var user = $( "#NUuser" ).val();
	var pass = $( "#NUpass" ).val();
	var pass2 = $( "#NUpass2" ).val();

	console.log(pass.length);

	if(name =='' || user =='' || pass =='' || pass2 =='')
	{ mensaje = 'Debe llenar todos los campos';}
	else if (pass.length < 6) { mensaje='La contraseña debe tener al menos 6 caracteres';}
		else if (pass == pass2) {
			$('#validacion').html('');			
			$.ajax({
				type:'post',
				url:'../controller/controller_usuadmin.php',
				data: { opcion: 2,
						name:name,
						user:user,
						pass:pass},
				success: function (data){
					alert(data);
					$('#nuevousuario').modal('hide');
					cargarusuarios();
				}
			});
		}else{mensaje='Las contraseñas no coinciden';	}
	$('#validacionA').html(mensaje);
}
function verdetalle (id){
	$.ajax({
		type:'post',
		url:'../controller/controller_usuadmin.php',
		data: { opcion: 3,
				id:id
				},
		success : function(data){
			console.log(data);
			Json = JSON.parse(data);
			$.each(Json, function(index, val){
				$( "#Uname" ).val(val.NOMBRE);
				$( "#Uuser" ).val(val.CODIGO);
				$( "#Upass" ).val(val.PASSWORD);
				$( "#Upass2" ).val('');
				var save ='<button type="button" class="btn" onclick="Actualizar('+val.ID+')">Guardar</button>';
				var del="<button type='button' class='btn' onclick='eliminarUsuario("+val.ID+")'>Eliminar</button>";
				var edit ='<button type="button" class="btn" onclick="editarusuario();" >Editar</button>';
				$( "#modalbtn" ).html(edit+save+del);
				$( "#titulomodal" ).html('Detalles Usuario '+ val.NOMBRE);
			});
			$('#modalusuario').modal({backdrop: 'static', keyboard: false});
		}
	});
}

function Actualizar(id){
	var mensaje;
	var name = $( "#Uname" ).val();
	var user = $( "#Uuser" ).val();
	var pass = $( "#Upass" ).val();
	var pass2 = $( "#Upass2" ).val();

	console.log(pass.length);

	if(name =='' || user =='' || pass =='' || pass2 =='')
	{ mensaje = 'Debe llenar todos los campos';}
	else if (pass.length < 6) { mensaje='La contraseña debe tener al menos 6 caracteres';}
		else if (pass == pass2) {
			$('#validacion').html('');			
			$.ajax({
				type:'post',
				url:'../controller/controller_usuadmin.php',
				data: { opcion: 4,
						id:id,
						name:name,
						user:user,
						pass:pass},
				success: function (data){
					alert(data);
					$('#modalusuario').modal('hide');
					cargarusuarios();
				}
			});
		}else{mensaje='Las contraseñas no coinciden';	}
	$('#validacion').html(mensaje);
}
function eliminarUsuario(id){
	var nombre =$('#Uname').val();
	var cancel ='<button type="button" class="btn" data-dismiss="modal">Cancelar</button>';
	var del='<button type="button" class="btn" onclick="Eliminar('+id+')">Eliminar</button>';

	$('#oktitle').html('Se va a eliminar el usuario '+ nombre);
	$('#okbtn').html(del+cancel);
	$('#modalusuario').modal('hide');
	$('#modalok').modal({backdrop: 'static', keyboard: false});
}
function Eliminar(id){
	$.ajax({
				type:'post',
				url:'../controller/controller_usuadmin.php',
				data: { opcion: 5,
						id:id,},
				success: function (data){
					$('#nuevousuario').modal('hide');
					$('#modalok').modal('hide');
					cargarusuarios();
				}
			});
}