<?php 
	require_once '../model/model_adicionales.php';

$model = new adicionales();

if(isset($_POST['opcion'])){

	$opcion = $_POST['opcion'];
}


switch ($opcion) {
	case 1:
		$resultado = $model->cargarMotores();
	if($resultado){
		while ($row = odbc_fetch_array($resultado)) {
			$response['ID']=$row['idMotor'];
			$response['PRODUCTO']=$row['tipoProducto'];
			$response['NOMBRE']=$row['descripcionMotor'];
			$response['TIPO']=$row['carreraMotor'];
			$response['PRECIO']=$row['precioMotor'];
			$json[]=$response;
		}
		print json_encode($json);
	}
	break;
	case 2:
		$id=$_POST['id'];
			$resultado = $model->verMotores($id);
	if($resultado){
		while ($row = odbc_fetch_array($resultado)) {
			$response['ID']=$row['idMotor'];
			$response['PRODUCTO']=$row['tipoProducto'];
			$response['NOMBRE']=$row['descripcionMotor'];
			$response['TIPO']=$row['carreraMotor'];
			$response['PRECIO']=$row['precioMotor'];
			$response['ACTIVACION']=$row['activacion'];
			$response['VOLTAJE']=$row['voltaje'];
			$response['TUBO']=$row['tubo'];
			$response['RPM']=$row['RPM'];
			$response['AMPERAJE']=$row['amperaje'];
			$json[]=$response;
		}
		print json_encode($json);
	}	
	break;
	case 3:
		$id=$_POST['id'];
		$resultado = $model->quitarMotores($id);
	if($resultado){
		$response = 'Eliminado con Exito!';
		}else{
		$response = 'Ocurrio un error intente mas tarde';
		}	
		print $response;
	break;
	case 4:
		$Producto = $_POST['Producto'];
		$Nombre = $_POST['Nombre'];
		$Tipo = $_POST['Tipo'];
		$Precio = $_POST['Precio'];
		$Activacion = $_POST['Activacion'];
		$Voltaje = $_POST['Voltaje'];
		$Tubo = $_POST['Tubo'];
		$RPM = $_POST['RPM'];
		$Amperaje = $_POST['Amperaje'];
		$resultado = $model->AddMotores($Producto, $Nombre, $Tipo, $Precio, $Activacion, $Voltaje, $Tubo, $RPM, $Amperaje);
		if($resultado){
		$response = 'Creado con Exito!';
		}else{
		$response = 'Ocurrio un error intente mas tarde';
		}	
		print $response;
	break;
	case 5:
		$precio = $_POST['precio'];
		$resultado = $model->Cover_light($precio);
	if($resultado){
		$response = 'Actualizado con Exito!';
		}else{
		$response = 'Ocurrio un error intente mas tarde';
		}	
		print $response;
	break;

	case 6:
		$resultado = $model->loadCover();
		if($resultado){
			while ($row = odbc_fetch_array($resultado)) {
				$response['PRECIO']= $row['precioCover_Light'];
			}
		}
			print json_encode($response);		
	break;
	case 7:
		$resultado = $model->loadPerfil();
			if($resultado){
				while ($row = odbc_fetch_array($resultado)) {
					$response['TIPO']= $row['tipoPerfil'];
					$response['NOMBRE']= $row['nombrePerfil'];
					$response['COLOR']= $row['colorPerfil'];
					$json[]=$response;
				}
			}
		print json_encode($json);

	break;
	case 8:
		$tipo = $_POST['tipo'];
		$nombre = $_POST['nombre'];
		$color = $_POST['color'];
		$resultado = $model->quitarPerfil($tipo, $nombre, $color);
	if($resultado){
		$response = 'Eliminado con Exito!';
		}else{
		$response = 'Ocurrio un error intente mas tarde';
		}	
		print $response;

	break;
	case 9:
		$tipo = $_POST['tipo'];
		$nombre = $_POST['nombre'];
		$color = $_POST['color'];
		$resultado = $model->crearPerfil($tipo, $nombre, $color);
	if($resultado){
		$response = 'Creado con Exito!';
		}else{
		$response = 'Ocurrio un error intente mas tarde';
		}	
		print $response;

	break;
	default:
		# code...
		break;
}








 ?>