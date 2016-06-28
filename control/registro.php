<?php

	require_once '../model/registro.php';

	$registro = new registro();


$opcion=$_POST['opcion'];

switch ($opcion) {
	case 'trade':
		$facturado=$_POST['facturado'];
		$nit= $_POST['idusuario'];
		$origen=$_POST['origen'];
		$tipodcto=$_POST['tipodcto'];

		$resultado= $registro->registrarTrade($facturado, $nit, $origen, $tipodcto);
			       	
		echo $resultado;


		break;
		case 'mvtrade':
		$cantidad=$_POST['cantidad'];
		$descuentoDistri=$_POST['descuentoDistri'];
		$detalle=$_POST['detalle'];
		$iva=$_POST['iva'];
		$valoruni=$_POST['valoruni'];
		$alto= $_POST['alto'];
		$ancho=$_POST['ancho'];
		$idCliente=$_POST['idusuario'];
		$producto=$_POST['producto'];
		$observaciones =$_POST['observaciones'];

		$resultado= $registro->Producto($cantidad, $descuentoDistri, $detalle, $iva, $valoruni, $alto, $ancho, $idCliente, $producto, $observaciones);
			       	
		echo $resultado;


		break;
	default:
	//	error_log('Ocurrio un errro al tratar de registrar los datos de ' $_SESSION['usueio_nombre']);
		break;
}


?>