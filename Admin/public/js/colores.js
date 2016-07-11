function cargartipo(){
	$.ajax({
			type: 'post',
			url : '../controller/controller_colores.php',
			data: {opcion: 1},
		success: function (data){
			Json = JSON.parse(data);
			var select = document.getElementById("da_tipo_tela_col");
				while(select.options.length > 0)
				{                
    				select.remove(0);
    			}
    			var option = document.createElement('option');
				option.value = "SELECCIONE";
	    		option.text = "-- Seleccione --";
	    		select.add(option);
			$.each(Json, function(index, val){
				var option = document.createElement('option');
				option.value = val.TIPO;
    			option.text = val.TIPO;
    			select.add(option);

			});

		}
	});
}

function nombretela(tipo){
	if(tipo=='SELECCIONE'){
		var select = document.getElementById("da_tela_color");
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
		        data:  {tipo: tipo, opcion: 2},
		        url:   '../controller/controller_colores.php',
		        type:  'post',
	      
	        success:  function (data) {
				Json =JSON.parse(data);
				var select = document.getElementById("da_tela_color");
					while(select.options.length > 0)
					{                
	    				select.remove(0);
	    			}
	  				var option = document.createElement('option');
					option.value = "SELECCIONE";
		    		option.text = "-- Seleccione --";
		    		select.add(option);
	    		$.each(Json, function(index, val) {
			     	var option = document.createElement('option');
					option.value = val.TELA;
	    			option.text = val.TELA;
	    			select.add(option);
				});
	        }

		});
	}

}
function colores(){
	var tipo =$('#da_tipo_tela_col').val();
	var tela =$('#da_tela_color').val();
	if(tela=='SELECCIONE'){
		document.getElementById('colores').style.display ='none';
	}else{
		$('#detallecolores tr').each(function(){ $(this).remove();})
		document.getElementById('colores').style.display ='block';
	    $.ajax({
		        data:  {tipo: tipo, tela:tela, opcion: 3},
		        url:   '../controller/controller_colores.php',
		        type:  'post',
	      
	        success:  function (data) {
	        	//console.log(data);
				Json =JSON.parse(data);
				
	    		$.each(Json, function(index, val) {
	    			var value ="'"+val.TIPO+"','"+val.NOMBRE+"','"+val.COLOR+"'";
	    			var minus = '<i class="fa fa-minus" style="font-size:15px;"></i>';
	    			var plus = '<i class="fa fa-plus" style="font-size:15px;"></i>';
	    			//console.log(value);
			     	var id = '<td style="text-align:center; display:none" width="1%"></td>';
	                var color = '<td style="text-align:center;" width="60%">'+val.COLOR+'</td>';
	                var minus ='<button class="btn btn-danger" title="Ver" onclick="EliminarC('+value+')">'+minus+'</button>';
	                var  plus ='<button class="btn btn-success" title="Ver" onclick="AgregarC()">'+plus+'</button>';
	                var Botones = '<td style="text-align:center" width="40%">'+minus+plus+'</td>';
	                
	                var total = '<tr class="lista">'+id+color+Botones+'</tr>';
	                scroll();
	                $('#detallecolores').append(total);
				});
	        }

		});
	}

}

function scroll(){
	var alto= $('#colorContent').height();
	console.log('el widht es '+ alto );
	if (alto > 169) {
		$('#colorContent').addClass('Scroller');

	}else{
		$('#colorContent').removeClass('Scroller');		
	}

}
function EliminarC(tipo,nombre,color){
	var id ="'"+tipo+"','"+nombre+"','"+color+"'";
	var cancel ='<button type="button" class="btn" data-dismiss="modal">Cancelar</button>';
	var del='<button type="button" class="btn" onclick="Eliminar('+id+')">Eliminar</button>';

	$('#oktitle').html('Se va a eliminar el Color '+ color);
	$('#okbtn').html(del+cancel);
	//$('#modalusuario').modal('hide');
	$('#modalok').modal({backdrop: 'static', keyboard: false});

}

function Eliminar(tipo,nombre,color){
	$.ajax({
		type:'post',
		url:'../controller/controller_colores.php',
		data:{tipo:tipo, tela:nombre, color:color, opcion: 4},
	success: function (data){
			console.log(data);
			alert(data);
			$('#modalok').modal('hide');
			colores();
			scroll();
			}
	});
}
function AgregarC(){
$('#coloradd').modal({backdrop: 'static', keyboard: false});
}
function Agregar(){
	var mensaje;
 	var tipo = $('#da_tipo_tela_col').val();
	var tela = $('#da_tela_color').val();
	var color = $('#Ncolor').val();
	$('#colortittle').html('Nuevo Color ');
	if (color=='') {
		mensaje='Debe Especificar el Color';		
	}else{
		document.getElementById('validacionC').style.display ='none';
		$.ajax({
			type:'post',
			url:'../controller/controller_colores.php',
			data:{tipo:tipo, tela:tela, color:color, opcion: 5},
		success: function (data){
				console.log(data);
				alert(data);
				$('#coloradd').modal('hide');
				colores();
				limpiarform();
				}
		});

	}
	document.getElementById('validacionC').style.display ='block';
	$('#validacionC').html(mensaje);

}
function limpiarform(){
	$('#Ncolor').val('');
}