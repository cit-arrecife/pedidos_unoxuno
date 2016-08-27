<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
	require_once '../model/model_myorders.php';

	$myorders = new model_myorders();

	$opcion=$_POST['opcion'];

	switch ($opcion) {
		case 'CargarPedidos':
			
			$idcliente=trim($_POST['idcliente']);
			$Resultado = $myorders->cargarPedidos($idcliente);

			if($Resultado){
			while($row = odbc_fetch_array($Resultado)){
				$response['NRODCTO']=$row['NRODCTO'];
				$response['REFERENCIAPEDIDO']=$row['REFERENCIAPEDIDO'];
				$response['FECHA']=$row['FECHA'];
				$response['BRUTO']=$row['BRUTO'];
				$response['DESCCOMER']=$row['DESCCOMER'];
				$json[]=$response;
			}
				echo json_encode($json);
			}

		break;
		case 'CargarProductos':
			
			$nrodcto=trim($_POST['nrodcto']);
			//error_log($nrodcto);
			$Resultado = $myorders->cargarProductos($nrodcto);
			//error_log(print_r($Resultado)); 
			if($Resultado){
			while($row = odbc_fetch_array($Resultado)){
				$response['NOMBRE']=$row['NOMBRE'];
				$response['CANTIDAD']=$row['CANTIDAD'];
				$response['ANCHO']=$row['ANCHO'];
				$response['ALTO']=$row['ALTO'];
				$response['VALORUNIT']=$row['VALORUNIT'];
				$response['NOTA']=$row['NOTA'];
				$json[]=$response;
			}
				echo json_encode($json);
			}

		break;
		default:
			# code...
			break;
	}
?>