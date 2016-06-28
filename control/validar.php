<?php
	require_once  '../model/modelo_validar.php';
		$validar = new modelo_validar();

	$opcion = $_POST['opcion'];
		//error_log($opcion);
	switch ($opcion) {
		case 1:
			$tipoproducto = $_POST['tipoproducto'];
			$Resultado = $validar->validar_producto($tipoproducto);
			$i=0;
			if($Resultado){
				while ($row = odbc_fetch_array($Resultado)) {
					$response["tipoPresentacionProducto"] = $row["tipoPresentacionProducto"];
					$json[] = $response;	
				}
			}
			echo json_encode($json);
		break;
		case 2:
			$presentacionproducto = $_POST['presentacionproducto'];
			$tipoproducto =$_POST['tipoproducto'];
			$Resultado = $validar->validar_presentacion($tipoproducto,$presentacionproducto);
			
			if($Resultado){
				while ($row = odbc_fetch_array($Resultado)) {
					$response["tipoTelaProducto"] = $row["tipoTelaProducto"];
					$json[] = $response;	
				}
			}
			echo json_encode($json);
		break;
		case 3:
			$tipoproducto =$_POST['tipoproducto'];
			$presentacionproducto = $_POST['presentacionproducto'];
			$telaproducto=$_POST['telaproducto'];
			$Resultado = $validar->validar_tela($tipoproducto,$presentacionproducto, $telaproducto);
			
			if($Resultado){
				while ($row = odbc_fetch_array($Resultado)) {
					$response["telaProducto"] = $row["telaProducto"];
					$json[] = $response;	
				}
			}
			echo json_encode($json);
		break;
		case 4:
			$tipo =$_POST['tipo'];
			$tela =$_POST['tela'];
			$Resultado = $validar->validar_color($tipo, $tela);
			if($Resultado){
				while ($row = odbc_fetch_array($Resultado)) {
					$response["colorTela"] = $row["colorTela"];
					$json[] = $response;	
				}
			}
			echo json_encode($json);
		break;
		case 5:
			$tipoproducto=$_POST['tipoproducto'];
			$presentacionproducto=$_POST['presentacionproducto'];
			$tipoTelaProducto=$_POST['tipoTelaProducto'];
			$telaproducto=$_POST['telaproducto'];
			$Resultado = $validar->seleccionar_producto($tipoproducto, $presentacionproducto, $tipoTelaProducto,$telaproducto);
			if($Resultado){
				$response["Precio"] = $Resultado["Precio"];				
				}

			echo json_encode($response);
		break;
		case 6:
			$tipoproducto = $_POST['tipoproducto'];
			$Resultado = $validar->Perfil($tipoproducto);
			if($Resultado){
				while ($row = odbc_fetch_array($Resultado)) {
					$response["nombrePerfil"] = $row["nombrePerfil"];				
					$json[] = $response;
				}
			}
			echo json_encode($json);
		break;
		case 7:
			$nombreperfil = $_POST['nombreperfil'];
			$Resultado = $validar->Perfil_Color($nombreperfil);
			if($Resultado){
				while ($row = odbc_fetch_array($Resultado)) {
					$response["colorPerfil"] = $row["colorPerfil"];				
					$json[] = $response;
				}
			}
			echo json_encode($json);
		break;
		default:
			error_log('Ocurrio un error al momento de enviar los datos a validar.php opcion numero '.$opcion);
		break;
	}




?>