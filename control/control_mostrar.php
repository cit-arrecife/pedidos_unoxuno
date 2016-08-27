<?php
	require_once '../model/model_mostrar.php';

	$mostrar = new model_mostrar();

	$opcion=$_POST['opcion'];

	switch ($opcion) {
		case 'CargarEncabezado':
			
			$idcliente=trim($_POST['idcliente']);

			$Resultado = $mostrar->cargarEncabezado($idcliente);

			if($Resultado){
				$response['FECHA']=$Resultado['FECHA'];
				$response['NRODCTO']=$Resultado['NRODCTO'];
				echo json_encode($response);
			}

		break;
		case 'CargarProductos':
			
			$idcliente=trim($_POST['idcliente']);
			$nrodcto=trim($_POST['nrodcto']);
			$Resultado = $mostrar->cargarProductos($idcliente, $nrodcto);

			if($Resultado){
			while($row = odbc_fetch_array($Resultado)){
				$response['IDPRODUCTO']=$row['IDPRODUCTO'];
				$response['DETALLE']=$row['DETALLE'];
				$response['CANTIDAD']=$row['CANTIDAD'];
				$response['ANCHO']=$row['ANCHO'];
				$response['ALTO']=$row['ALTO'];
				$response['VALORUNIT']=$row['VALORUNIT'];
				$response['PRODUCTO']=$row['PRODUCTO'];
				$json[]=$response;
			}
				echo json_encode($json);
			}

		break;
		case 'EliminarProductos':
			
			$idproducto=trim($_POST['idproducto']);
			$nrodcto=trim($_POST['nrodcto']);
			$Resultado = $mostrar->EliminarProductos($idproducto, $nrodcto);
			if($Resultado){
				$response['Susess']='Susess';

			}
			echo json_encode($response);
			

		break;
		
		default:
			# code...
			break;
	}









?>