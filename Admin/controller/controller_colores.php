<?php 
require_once '../model/model_colores.php';

$model = new colores();

if(isset($_POST['opcion'])){

	$opcion = $_POST['opcion'];
}

switch ($opcion) {
	case 1:
		$respuesta = $model->cargartipo();
		if ($respuesta){
			while ($row = odbc_fetch_array($respuesta)) {
				$response['TIPO']=$row['tipoTela'];
				$json[]=$response;
			}
			print json_encode($json);
		}
	break;
	case 2:
		$tipo =$_POST['tipo'];
		$respuesta = $model->cargartela($tipo);
		if ($respuesta){
			while ($row = odbc_fetch_array($respuesta)) {
				$response['TELA']=$row['nombreTela'];
				$json[]=$response;
			}
			print json_encode($json);
		}
	break;
	case 3:
		$tipo =$_POST['tipo'];
		$tela =$_POST['tela'];
		$respuesta = $model->cargarcolor($tipo, $tela);
		if ($respuesta){
			while ($row = odbc_fetch_array($respuesta)) {
				$response['TIPO']=$row['tipoTela'];
				$response['NOMBRE']=$row['nombreTela'];
				$response['COLOR']=$row['colorTela'];

				$json[]=$response;
			}
			print json_encode($json);
		}
	break;
	default:
		# code...
		break;
}





 ?>