function tablas(table){
	
	switch (table) {
		case 'Motor':
	document.getElementById('tmotor').style.display ='block';
	document.getElementById('tcover').style.display ='none';
	document.getElementById('tperfil').style.display ='none';
	document.getElementById('tcenefa').style.display ='none';			
		break;
		case 'Cover':
	document.getElementById('tmotor').style.display ='none';
	document.getElementById('tcover').style.display ='block';
	document.getElementById('tperfil').style.display ='none';
	document.getElementById('tcenefa').style.display ='none';			
		break;
		case 'Perfil':
	document.getElementById('tmotor').style.display ='none';
	document.getElementById('tcover').style.display ='none';
	document.getElementById('tperfil').style.display ='block';
	document.getElementById('tcenefa').style.display ='none';			
		break;
		case 'Cenefa':
	document.getElementById('tmotor').style.display ='none';
	document.getElementById('tcover').style.display ='none';
	document.getElementById('tperfil').style.display ='none';
	document.getElementById('tcenefa').style.display ='block';			
		break;
		default:
			// statements_def
			break;
	}
}
function nuevousuario (){
	$('#titulomotor').html('Nuevo Motor');
	 var S ='<button  class="btn" onclick="Guardar()">Guardar</button>';
	 var C ='<button  class="btn" data-dismiss="modal" >Cancelar</button>';
	 $('#modalbtnM').html(S+C);
	$('#modalMotor').modal({backdrop: 'static', keyboard: false});

}
function Guardar(){
	var mensaje='';
	var p = $('#Producto').val();
	var n = $('#Nombre').val();
	var t =	$('#Tipo').val();
	var Pr = $('#Precio').val();
	var A =	$('#Activacion').val();
	var Vo = $('#Voltaje').val();
	var tu = $('#Tubo').val();
	var Rp = $('#RPM').val();
	var Am = $('#Amperaje').val();

	var Campos =['#Producto', '#Nombre', '#Precio', '#Activacion', '#Voltaje', '#Tipo', '#Tubo', '#RPM', '#Amperaje'];
	$.each(Campos, function(index, val){
		var full = $(val).val();
		if (full=='') {
			$(val).addClass('alerta');	
			mensaje='Debe llenar todos los campos';
		}
		else{
			$(val).removeClass('alerta');	
		}

	});

		if (mensaje=='') {
		$.ajax({
			type:'post',
			url : '../controller/controller_adicionales.php',
			data: { opcion: 4,
					Producto: p,
					Nombre: n,
					Tipo: t,
					Precio:Pr,
					Activacion:A,
					Voltaje:Vo,
					Tubo:tu,
					RPM:Rp,
					Amperaje:Am },
			success: function(data){
				alert(data);
				lemotore();
				$('#modalMotor').modal('hide');
			}
		});

	}


}



function verdetalle (id){
	$.ajax({
			type:'post',
			url:'../controller/controller_adicionales.php',
			data:{opcion:2, id:id},
		success: function (data){

			Json = JSON.parse(data);
			//console.log(data);
			$.each(Json, function(index, val){
				$('#Producto').val(val.PRODUCTO);
				$('#Nombre').val(val.NOMBRE);
				$('#Tipo').val(val.TIPO);
				$('#Precio').val(val.PRECIO);
				$('#Activacion').val(val.ACTIVACION);
				$('#Voltaje').val(val.VOLTAJE);
				$('#Tubo').val(val.TUBO);
				$('#RPM').val(val.RPM);
				$('#Amperaje').val(val.AMPERAJE);
				$('#titulomotor').html('Detalles de '+val.NOMBRE);
		 		//var S ='<button  class="btn" onclick="Guardar()">Guardar</button>';
		 		var C ='<button  class="btn" data-dismiss="modal" onclick="limpiar()" >Cerrar</button>';
		 		$('#modalbtnM').html(C);
				$('#modalMotor').modal({backdrop: 'static', keyboard: false});			
			});
		}
	});

}

function lemotore(){
	$('#detallemotor').empty();
	$.ajax({
			type:'post',
			url:'../controller/controller_adicionales.php',
			data:{opcion:1},
		success: function (data){
			//console.log(data);
			Json = JSON.parse(data);
			$.each(Json, function(index,val){
					var id = '<td style="text-align:center; display:none" width="1%">'+val.ID+'</td>';
					var prod ='<td style="text-align:center;" width="20%">'+val.PRODUCTO+'</td>';
					var nomb = '<td style="text-align:center;" width="20%">'+val.NOMBRE+'</td>';
	                var tipo = '<td style="text-align:center;" width="20%">'+val.TIPO+'</td>';
	                var precio = '<td style="text-align:center;" width="20%">'+val.PRECIO+'</td>';
	                var boton ='<button id="btnVer'+val.ID+'" class="btn " title="Detalles" onclick="verdetalle('+val.ID+')">Ver</button>';
	                var btn ='<button id="btnVer'+val.ID+'" class="btn btn-danger"  onclick="Eliminar('+val.ID+')">Quitar</button>';
	                var addBtn = '<td style="text-align:center">'+boton+btn+'</td>';
	                var total = '<tr class="lista" id="tr_'+val.ID+'">'+id+prod+nomb+tipo+precio+addBtn+'</tr>';
	                scroll('#motorContent');
	                $('#detallemotor').append(total);
			});
		}
	});
}

function scroll(id){
	var alto= $(id).height();
	//console.log('el widht es '+ alto );
	if (alto > 169) {
		$(id).addClass('Scroller');

	}else{
		$(id).removeClass('Scroller');		
	}
}
function limpiar(){
	$('#Producto').val('');
	$('#Nombre').val('');
	$('#Tipo').val('');
	$('#Precio').val('');
	$('#Activacion').val('');
	$('#Voltaje').val('');
	$('#Tubo').val('');
	$('#RPM').val('');
	$('#Amperaje').val('');

}
function Eliminar(id){
	$('#oktitle').html('Va a Eliminar el motor Esta Seguro');
	var E ='<button  class="btn" data-dismiss="modal" onclick="EliminarM('+id+')" >Eliminar</button>';
	var C ='<button  class="btn" data-dismiss="modal" onclick="limpiar()" >Cerrar</button>';
	$('#okbtn').html(E+C);
	$('#modalok').modal({backdrop: 'static', keyboard: false});			
}

function EliminarM (id) {
	 $.ajax({
		 	type :'post',
		 	url: '../Controller/controller_adicionales.php',
		 	data: {opcion:3, id:id},
		 success: function(data){
		 	alert(data);
		 	lemotore();
		 	$('#modalMotor').modal('hide');

		 }
	 });



}
function Update(){
	var Precio = $('#solo-numero').val();

	if(Precio != ''){
		$.ajax({
				type:'post',
				url:'../controller/controller_adicionales.php',
				data:{opcion: 5, precio:Precio},
			success: function(data){
				alert(data);
			}
		});
	}
}
function loadCover(){
	$.ajax({
			type:'post',
			url:'../controller/controller_adicionales.php',
			data:{opcion: 6},
		success: function(data){
			//console.log(data);
			Json = JSON.parse(data);
			$('#solo-numero').val(Json.PRECIO);
		}
	});
}

function loadPerfil(){
	$('#detalleperfil').empty();

	$.ajax({
			type:'post',
			url:'../controller/controller_adicionales.php',
			data:{opcion: 7},
		success: function(data){
			
			Json = JSON.parse(data);
			$.each(Json, function(index,val){
					var datas = "'"+val.TIPO+"','"+val.NOMBRE+"','"+val.COLOR+"'";
					var tipo = '<td style="text-align:center;" width="25%">'+val.TIPO+'</td>';
					var nomb = '<td style="text-align:center;" width="25%">'+val.NOMBRE+'</td>';
	                var color = '<td style="text-align:center;" width="25%">'+val.COLOR+'</td>';
	                var btn ='<button class="btn btn-danger"  onclick="Eliminar('+1+')>Quitar</button>';
	                var C ='<button  class="btn btn-danger" onclick="Quitar('+datas+')" >Eliminar</button>';
	                var addBtn = '<td style="text-align:center">'+C+'</td>';
	                var total = '<tr class="lista">'+tipo+nomb+color+addBtn+'</tr>';
	                scroll('#perfilContent');
	                $('#detalleperfil').append(total);
			});
			
		}
	});
}

function Quitar(tipo, nombre, color){
	var datas = "'"+tipo+"','"+nombre+"','"+color+"'";
	$('#titlep').html('Va a Eliminar el Perfil ');
	var E ='<button  class="btn" data-dismiss="modal" onclick="QuitarP('+datas+')" >Eliminar</button>';
	var C ='<button  class="btn" data-dismiss="modal" onclick="limpiar()" >Cerrar</button>';
	$('#btnp').html(E+C);
	$('#modalp').modal({backdrop: 'static', keyboard: false});			

}
function QuitarP(tipo, nombre, color){
	$.ajax({
			type:'post',
			url:'../controller/controller_adicionales.php',
			data:{opcion: 8, tipo:tipo, nombre:nombre, color:color},
		success: function(data){
			alert(data);
			loadPerfil();
			$('#modalp').modal('hide');

		}
	});
}
function NuevoP(){
	
	$('#tituloperfil').html('Nuevo Perfil ');
	var E ='<button  class="btn"  onclick="nuevoPerfil()" >Guardar</button>';
	var C ='<button  class="btn" data-dismiss="modal" onclick="limpiar()" >Cerrar</button>';
	$('#modalbtnP').html(E+C);
	$('#modalPerfil').modal({backdrop: 'static', keyboard: false});			
}
function nuevoPerfil(){
	var tipo = $('#TipoP').val();
	var nombre = $('#NombreP').val();
	var color = $('#ColorP').val();

	if (tipo =='') {
		$('#TipoP').addClass('alerta');
	}else if (nombre=='') {
		$('#NombreP').addClass('alerta');
	}else if (color=='') {
		$('#ColorP').addClass('alerta');
	}else{
		$.ajax({

			type: 'post',
			url: '../controller/controller_adicionales.php',
			data: {opcion: 9, tipo:tipo, nombre:nombre, color:color},
		success :function(data){
			alert(data);
			$('#modalPerfil').modal('hide');						
			loadPerfil();
			 $('#TipoP').val('');
			 $('#NombreP').val('');
			 $('#ColorP').val('');
		}
		});




	}

}