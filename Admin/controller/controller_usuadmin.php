
<?php 


require_once '../model/model_usuadmin.php';

$model = new usuadmin();

if(isset($_POST['opcion'])){

	$opcion = $_POST['opcion'];
}


switch ($opcion) {
	case 1:
		$resultado =$model->cargarusuarios();
		if($resultado){	
			while($row = odbc_fetch_array($resultado)){
				$response['ID']=$row['ID_USU'];
				$response['NOMBRE']=$row['NOMBRE'];
				$response['CODIGO']=$row['CODIGO'];
				$response['PASSWORD']=$row['PASSWOORD'];
				$json[] =$response;
			}
			print json_encode($json);

		}
	break;
	case 2 :
		$name = $_POST['name'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$resultado = $model->NuevoUsuario($name, $user, $pass);
		if($resultado){
			$response='Usuario creado con exito!';
		}else{$response ='Ocurrio un error creando el usuario intente mas tarde';}
		print $response;
	break;
	case 3 :
		$id = $_POST['id'];
		$resultado = $model->verUsuario($id);
		if($resultado){	
			while($row = odbc_fetch_array($resultado)){
				$response['ID']=$row['ID_USU'];
				$response['NOMBRE']=$row['NOMBRE'];
				$response['CODIGO']=$row['CODIGO'];
				$response['PASSWORD']=$row['PASSWOORD'];
				$json[] =$response;
			}
		print json_encode($json);
		}
	break;
	case 4 :
		$id = $_POST['id'];
		$name = $_POST['name'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$resultado = $model->ActualizarUsuario($id, $name, $user, $pass);
		if($resultado){
			$response='Usuario Actualizado con exito!';
		}else{$response ='Ocurrio un error Actualizando el usuario intente mas tarde';}
		print $response;
	break;
	case 5 :
		$id = $_POST['id'];
		$resultado = $model->EliminarUsuario($id);
		if($resultado){
			$response='Usuario Actualizado con exito!';
		}else{$response ='Ocurrio un error Actualizando el usuario intente mas tarde';}
		print $response;
	break;
	default:

	break;

}


 ?>