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
	        	console.log(data);
				Json =JSON.parse(data);
				
	    		$.each(Json, function(index, val) {
	    			var value ="'"+val.TIPO+"','"+val.NOMBRE+"','"+val.COLOR+"'";
	    			console.log(value);
			     	var id = '<td style="text-align:center; display:none" width="1%"></td>';
	                var color = '<td style="text-align:center;" width="20%">'+val.COLOR+'</td>';
	                var boton ='<button class="btn btn-danger" title="Ver" onclick="verdetalle('+value+')">Ver</button>';
	                var addBtn = '<td style="text-align:center">'+boton+'</td>';
	                var total = '<tr class="lista" id="tr_'+val.ID+'">'+id+color+addBtn+'</tr>';
	                $('#detallecolores').append(total);
				});
	        }

		});
	}



}