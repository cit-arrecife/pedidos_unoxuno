<?php

	require_once '../model/model_propio.php';

	$m_propio = new model_propio();

	if(isset($_POST['elegir'])){
			$elegir =$_POST['elegir'];
			
			switch($elegir){

				case '0': //traer motores desde la base de datos dependiendo el tipo de motor
				$tipomotor =$_POST['tipo_motor'];
				$tipoproducto =$_POST['tipo_producto'];
				$Resultado = $m_propio->BuscarMotor($tipomotor, $tipoproducto);
				if($Resultado){
					while ($row = odbc_fetch_array($Resultado)) {
						$response["descripcionMotor"] = $row["descripcionMotor"];
						$json[] = $response;	
					}
					echo json_encode($json);
				}else
				{
					error_log("No se encontraron datos para ese motor");
				}

			break;
			case '1': //traer motores desde la base de datos dependiendo el tipo de motor
				$tipomotor =$_POST['tipo_motor'];
				$tipoproducto =$_POST['tipo_producto'];
				$Resultado = $m_propio->precio_motor($tipomotor, $tipoproducto);
				if($Resultado){
					$response["precioMotor"] = $Resultado["precioMotor"];
					echo json_encode($response);
				}else
				{
					error_log("No se encontraron datos para ese motor");
				}

			break;
			case '2': //traer motores desde la base de datos dependiendo el tipo de motor
				$tipomotor =$_POST['tipo_motor'];
				$tipoproducto =$_POST['tipo_producto'];
				$Resultado = $m_propio->detalles_motor($tipomotor, $tipoproducto);
				if($Resultado){
					while ($row = odbc_fetch_array($Resultado)) {
						$response["activacion"] = $row["activacion"];
						$response["voltaje"] = $row["voltaje"];
						$response["tubo"] = $row["tubo"];
						$response["RPM"] = $row["RPM"];
						$response["amperaje"] = $row["amperaje"];
						$json[] = $response;	
					}
					echo json_encode($json);
				}else
				{
					error_log("No se encontraron datos para ese motor");
				}

			break;
			}//Cierre del switch


	}
	else{
	$Nombre = $_POST['usuario_nombre'];
	
	 $descuento_distribuidor_statico =$m_propio->Cargar_descuento_distri($Nombre);

		if($descuento_distribuidor_statico){
				$response["Descu"] = $descuento_distribuidor_statico["DESCCOMER"];
			echo json_encode($response);

		}else{
			error_log('El Distribuidor no tiene asignado un descuento o ocurrio un error durante la consulta');
		}

}//fin else

	?>