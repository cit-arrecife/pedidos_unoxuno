
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

	default:

	break;
}


 ?>